window.onload = function () {

//    function isValidDateFormat(date) {
//        var re = /^\d{4}\-\d{2}\-\d{2}$/;
//        return re.test(date);
//    }
//
//    function isDate(date) {
//        var parts = date.split("-");
//        var day = parseInt(parts[2], 10);
//        var month = parseInt(parts[1], 10);
//        var year = parseInt(parts[0], 10);
//
//        var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
//
//        if (year % 400 === 0 || (year % 100 !== 0 && year % 4 === 0)) {
//            monthLength[1] = 29;
//        }
//
//        return(year >= 1999 && year <= 2150
//                && month >= 1 && month <= 12 &&
//                day >= 1 && day <= monthLength[month - 1]);
//
//    }


    var submitBtn = document.getElementById('submit');

    submitBtn.addEventListener("click", function (event) {
        var valid = true;
        //error elements
        var regErrorElement = document.getElementById("regError");
        var makeErrorElement = document.getElementById("makeError");
        var modelErrorElement = document.getElementById("modelError");
        var capacityErrorElement = document.getElementById("capacityError");
        var engineSizeErrorElement = document.getElementById("engineSizeError");
        var purchaseDateErrorElement = document.getElementById("purchaseDateError");
        var serviceDateErrorElement = document.getElementById("serviceDateError");
        var gidErrorElement = document.getElementById("gidError");

        //set errrors to empty string
        regErrorElement.innerHTML = "";
        makeErrorElement.innerHTML = "";
        modelErrorElement.innerHTML = "";
        capacityErrorElement.innerHTML = "";
        engineSizeErrorElement.innerHTML = "";
        purchaseDateErrorElement.innerHTML = "";
        serviceDateErrorElement.innerHTML = "";
        gidErrorElement.innerHTML = "";

        //input elements
        var regField = document.getElementById('reg');
        var makeField = document.getElementById('make');
        var modelField = document.getElementById('model');
        var capacityField = document.getElementById('capacity');
        var engineSizeField = document.getElementById('engineSize');
        var purchaseDateField = document.getElementById('purchaseDate');
        var serviceDateField = document.getElementById('serviceDate');
        var gidField = document.getElementById('gid');

        //set variables to value of user input 
        var reg = regField.value;
        var make = makeField.value;
        var model = modelField.value;
        var capacity = capacityField.value;
        var engineSize = engineSizeField.value;
        var purchaseDate = purchaseDateField.value;
        var serviceDate = serviceDateField.value;
        var gid = gidField.value;

        //reg, make, model, capacity,  are required
        if (reg === "") {
            regErrorElement.innerHTML = "Reg cannot be blank";
            valid = false;
        }

        if (make === "") {
            makeErrorElement.innerHTML = "Make cannot be blank";
            valid = false;
        }

        if (model === "") {
            modelErrorElement.innerHTML = "Model cannot be blank";
            valid = false;
        }

        if (capacity === "") {
            capacityErrorElement.innerHTML = "Capacity cannot be blank";
            valid = false;
        }



        if (gid === "") {
            gidErrorElement.innerHTML = "Garage ID cannot be blank";
            valid = false;
        }

        if (purchaseDate === "") {
            purchaseDateErrorElement.innerHTML = "Purchase Date cannot be blank";
            valid = false;
        } else if (purchaseDate !== isValidDateFormat(purchaseDate)) {
            purchaseDateErrorElement.innerHTML = "Invalid Date Format: YYYY-MM-DD expected.";
            valid = false;
        }

        if (serviceDate === "") {
            serviceDateErrorElement.innerHTML = "Service Date cannot be blank";
            valid = false;
        }



        //if not valid don't submit form 
        if (!valid) {
            event.preventDefault();
        }
    });

};