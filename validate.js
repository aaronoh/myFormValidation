window.onload = function () {
//function to check date format
    function isValidDateFormat(date) {
        var re = /^\d{4}\-\d{2}\-\d{2}$/;
        return re.test(date);
    }
//function to check the date is a real date 
    function isDate(date) {
        var parts = date.split("-");
        var day = parseInt(parts[2], 10);
        var month = parseInt(parts[1], 10);
        var year = parseInt(parts[0], 10)

        var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        if (year % 400 === 0 || (year % 100 != 0 && year % 4 === 0)) {
            monthLength[1] = 29;
        }

        return(year >= 1999 && year <= 2150
                && month >= 1 && month <= 12 &&
                day >= 1 && day <= monthLength[month - 1]);

    }
//function to validate email through regular expression
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    var submitBtn = document.getElementById('submit');

    submitBtn.addEventListener("click", function (event) {
        var valid = true;
        //error elements
        var nameErrorElement = document.getElementById("nameError");
        var managerNameErrorElement = document.getElementById("managernameError");
        var addressErrorElement = document.getElementById("addressError");
        var emailErrorElement = document.getElementById("emailError");
        var phoneErrorElement = document.getElementById("phoneError");
        var openinghoursErrorElement = document.getElementById("openinghoursError");
        var openingdateErrorElement = document.getElementById("openingdateError");


        //set errrors to empty string
        nameErrorElement.innerHTML = "";
        managerNameErrorElement.innerHTML = "";
        addressErrorElement.innerHTML = "";
        emailErrorElement.innerHTML = "";
        phoneErrorElement.innerHTML = "";
        openinghoursErrorElement.innerHTML = "";
        openingdateErrorElement.innerHTML = "";

        //input elements
        var nameField = document.getElementById('name');
        var managerNameField = document.getElementById('managername');
        var addressField = document.getElementById('address');
        var emailField = document.getElementById('email');
        var phoneField = document.getElementById('phone');
        var openinghoursField = document.getElementById('openinghours');
        var openingdateField = document.getElementById('openingdate');


        //set variables to value of user input 
        var name = nameField.value;
        var managername = managerNameField.value;
        var address = addressField.value;
        var email = emailField.value;
        var phone = phoneField.value;
        var openinghours = openinghoursField.value;
        var openingdate = openingdateField.value;


        //name, manager name, phone and address are required
        if (name === "") {
            nameErrorElement.innerHTML = "Name cannot be blank";
            valid = false;
        }

        if (managername === "") {
            managerNameErrorElement.innerHTML = "Manager Name cannot be blank";
            valid = false;
        }

        if (address === "") {
            addressErrorElement.innerHTML = "Address cannot be blank";
            valid = false;
        }
        //if its not blank it must be the right format & a real date
        if (openingdate !== "" && !isValidDateFormat(openingdate)) {
            openingdateErrorElement.innerHTML = "Opening date must be in the format YYYY-MM-DD";
            valid = false;
        } else if (openingdate != "" && !isDate(openingdate)) {
            openingdateErrorElement.innerHTML = "Please enter a valid date";
            valid = false;
        }

        if (email !== "" && !validateEmail(email)) {
            emailErrorElement.innerHTML = "Please enter a valid email";
            valid = false;
        }

        if (phone === "") {
            phoneErrorElement.innerHTML = "Phone number cannot be blank";
            valid = false;
        }



        //if not valid don't submit form 
        if (!valid) {
            event.preventDefault();
        }
    });

};