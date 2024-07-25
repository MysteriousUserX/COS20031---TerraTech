<?php
// Read the current data from the JSON file
$dataFile = 'json_data/agents.json';
$data = json_decode(file_get_contents($dataFile), true);

// Get the next UUID (increment the highest UUID value)
$maxUUID = max(array_column($data, 'UUID'));
$newUUID = $maxUUID + 1;

// Get form data
$name = $_POST['name'];
$contactInfo = $_POST['contact_info'];

// Create a new agent entry
$newAgent = [
    'UUID' => $newUUID,
    'Name' => $name,
    'ContactInfo' => $contactInfo
];

// Add the new agent to the data array
$data[] = $newAgent;

// Save the updated data back to the JSON file
file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

// Redirect or output success message
header("Location: agents.php?success=true");
exit;