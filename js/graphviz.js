let dot = "";
let transactions = {};
let parties = {};
let properties = {};
let showMore = false;
const initialLimit = 20;
const extendedLimit = 100; // or whatever your extended limit is

document.addEventListener("DOMContentLoaded", function () {
    // Bind form submission
    document.getElementById("propertyForm").addEventListener("submit", function (event) {
        event.preventDefault();
        let searchTerm = document.getElementById("searchTerm").value.trim();
        fetchAndRenderGraph(searchTerm, showMore ? extendedLimit : initialLimit);
    });

    // Bind show more/less button
    document.getElementById("toggleButton").addEventListener("click", function () {
        showMore = !showMore;
        let searchTerm = document.getElementById("searchTerm").value.trim();
        fetchAndRenderGraph(searchTerm, showMore ? extendedLimit : initialLimit);
        this.textContent = showMore ? "Show Less" : "Show More";
    });

    // Initial fetch without search term to display all data
    fetchAndRenderGraph("", initialLimit);
});

function fetchAndRenderGraph(searchTerm = "", limit = initialLimit) {
    // Clear previous graph
    dot = "";
    transactions = {};
    parties = {};
    properties = {};
    clearGraph();

    let url = `fetching_data_API.php?limit=${limit}`;
    if (searchTerm) {
        url += `&searchTerm=${searchTerm}`;
    }

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            if (data.transactionParty.length === 0 && data.parties.length === 0 && data.transactions.length === 0 && data.properties.length === 0) {
                throw new Error("No results found");
            }

            // Create a lookup for party names and natures
            data.parties.forEach((party) => {
                parties[party.UUID] = {
                    name: party.Name,
                    nature: party.Nature,
                };
            });

            // Create a lookup for property names
            data.properties.forEach((property) => {
                properties[property.UUID] = property.Name;
            });

            // Create a lookup for transactions with order
            let transactionsTable = {};
            let transactionOrder = 1;
            data.transactions.forEach((transaction) => {
                transactionsTable[transaction.UUID] = {
                    ...transaction,
                    order: transactionOrder++,
                };
            });

            // Filter and construct the DOT graph description
            data.transactionParty.forEach((row) => {
                if (!transactions[row.TransactionUUID]) {
                    transactions[row.TransactionUUID] = {};
                }
                transactions[row.TransactionUUID][row.TypeOfTransaction] = row.PartyUUID;
            });

            dot = "digraph G {\n";
            dot += '    ratio="fill";\n';
            dot += "    beautify=true;\n";
            dot += "    penwidth=2.0;\n";
            dot += "    rankdir=LR;\n"; // Left to Right layout
            dot += "    nodesep=1.0;\n"; // Increase space between nodes
            dot += "    ranksep=2.0;\n"; // Increase space between ranks

            // Define subgraphs for better node layout
            dot += "    subgraph cluster_parties {\n";
            dot += '        label = "Parties";\n';
            dot += "        color = lightgrey;\n";

            // Add party nodes with different shapes based on nature
            Object.values(parties).forEach((party) => {
                let shape = "box"; // Default shape
                let color = "grey"; // Default color
                switch (party.nature) {
                    case "Individual": // pink circle
                        shape = "circle";
                        color = "pink";
                        break;
                    case "Organization": // yellow diamond
                        shape = "diamond";
                        color = "yellow";
                        break;
                    case "Government": // orange house
                        shape = "house";
                        color = "orange";
                        break;
                }
                dot += `        "${party.name}" [shape=${shape}, style=filled, color=${color}];\n`;
            });

            dot += "    }\n";

            // Add transaction edges with order labels
            Object.keys(transactions).forEach((transId) => {
                let trans = transactions[transId];
                let transaction = transactionsTable[transId];
                let propertyName = properties[transaction.PropertyUUID] || "Unknown Property";
                let transactionLabel = `${propertyName} (Transaction Order: ${transaction.order})`;

                if (trans.Seller && trans.Buyer) {
                    let sellerName = parties[trans.Seller]?.name || trans.Seller;
                    let buyerName = parties[trans.Buyer]?.name || trans.Buyer;
                    dot += `    "${sellerName}" -> "${buyerName}" [label="${transactionLabel}" color="Red" fontcolor="Red"];\n`;
                }
                if (trans.Owner && trans.Tenant) {
                    let ownerName = parties[trans.Owner]?.name || trans.Owner;
                    let tenantName = parties[trans.Tenant]?.name || trans.Tenant;
                    dot += `    "${ownerName}" -> "${tenantName}" [label="${transactionLabel}" color="Green" fontcolor="Green"];\n`;
                }
                if (trans.Lessor && trans.Lessee) {
                    let lessorName = parties[trans.Lessor]?.name || trans.Lessor;
                    let lesseeName = parties[trans.Lessee]?.name || trans.Lessee;
                    dot += `    "${lessorName}" -> "${lesseeName}" [label="${transactionLabel}" color="Blue" fontcolor="Blue" constraint=false];\n`;
                }
            });

            dot += "}";
        })
        .then(function () {
            d3.select("#graph").graphviz().renderDot(dot);
            console.log(dot);
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
            alert(error.message);
            clearGraph();
        });
}

function clearGraph() {
    d3.select("#graph").graphviz().renderDot('digraph G { }');
}