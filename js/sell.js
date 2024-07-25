try {
    function validatePropertyForm() {
        var address = document.forms["propertyForm"]["address"].value;
        var name = document.forms["propertyForm"]["name"].value;
        var propertySize = parseFloat(document.forms["propertyForm"]["property_size"].value);
        var bedrooms = parseInt(document.forms["propertyForm"]["bedrooms"].value);
        var bathrooms = parseInt(document.forms["propertyForm"]["bathrooms"].value);
        var floors = parseInt(document.forms["propertyForm"]["floors"].value);
        var yearBuilt = parseInt(document.forms["propertyForm"]["year_built"].value);
        var estimatedValue = parseFloat(document.forms["propertyForm"]["estimated_value"].value);

        var additionalInfo = document.forms["propertyForm"]["additional_info"].value;
        var amenity = document.forms["propertyForm"]["amenity"].value;
        var feature = document.forms["propertyForm"]["feature"].value;
        
        var propertyImage1 = document.forms["propertyForm"]["property_image_1"].files[0];
        var propertyImage2 = document.forms["propertyForm"]["property_image_2"].files[0];
        var propertyImage3 = document.forms["propertyForm"]["property_image_3"].files[0];
        var propertyImage4 = document.forms["propertyForm"]["property_image_4"].files[0];
        var propertyImage5 = document.forms["propertyForm"]["property_image_5"].files[0];

        document.getElementById("error-msg").style.opacity = 0;
        document.getElementById('error-msg').innerHTML = "";

        function showError(message) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>" + message + "</div>";
            fadeIn();
            window.scrollTo({ top: 300, behavior: 'smooth' });
        }

        if (!address || typeof address !== 'string') {
            showError("*Please enter a valid Address*");
            return false;
        }
        if (!name || typeof name !== 'string') {
            showError("*Please enter a valid Name*");
            return false;
        }
        if (isNaN(propertySize) || propertySize <= 0) {
            showError("*Please enter a valid Property Size*");
            return false;
        }
        if (isNaN(bedrooms) || bedrooms <= 0) {
            showError("*Please enter a valid Number of Bedrooms*");
            return false;
        }
        if (isNaN(bathrooms) || bathrooms <= 0) {
            showError("*Please enter a valid Number of Bathrooms*");
            return false;
        }
        if (isNaN(floors) || floors <= 0) {
            showError("*Please enter a valid Number of Floors*");
            return false;
        }
        if (isNaN(yearBuilt) || yearBuilt <= 0 || yearBuilt >= 2025) {
            showError("*Please enter a valid Year Built*");
            return false;
        }
        if (isNaN(estimatedValue) || estimatedValue <= 0) {
            showError("*Please enter a valid Estimated Value*");
            return false;
        }
        if (!propertyImage1) {
            showError("*Please upload Property Image 1*");
            return false;
        }
        if (!propertyImage2) {
            showError("*Please upload Property Image 2*");
            return false;
        }
        if (!propertyImage3) {
            showError("*Please upload Property Image 3*");
            return false;
        }
        if (!propertyImage4) {
            showError("*Please upload Property Image 4*");
            return false;
        }
        if (!propertyImage5) {
            showError("*Please upload Property Image 5*");
            return false;
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("simple-msg").innerHTML = this.responseText;
                document.forms["propertyForm"].reset();
            }
        };
        //xhttp.open("POST", "php/property.php", true);
        //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //xhttp.send("address=" + address + "&name=" + name + "&property_size=" + propertySize + "&bedrooms=" + bedrooms + "&bathrooms=" + bathrooms + "&floors=" + floors + "&year_built=" + yearBuilt + "&estimated_value=" + estimatedValue + "&additional_info=" + additionalInfo + "&amenity=" + amenity + "&feature=" + feature);
        return false;
    }

    function fadeIn() {
        var fade = document.getElementById("error-msg");
        var opacity = 0;
        var intervalID = setInterval(function () {
            if (opacity < 1) {
                opacity = opacity + 0.5;
                fade.style.opacity = opacity;
            } else {
                clearInterval(intervalID);
            }
        }, 200);
    }
} catch (error) {
    console.error(error);
}
