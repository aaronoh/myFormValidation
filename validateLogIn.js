window.onload = function () {


    var submitBtn = document.getElementById('Login');

    submitBtn.addEventListener("click", function (event) {
        var valid = true;
        //error elements
        var usernameErrorElement = document.getElementById("usernameError");
        var passwordErrorElement = document.getElementById("passwordError");

        //set errrors to empty string
        usernameErrorElement.innerHTML = "";
        passwordErrorElement.innerHTML = "";


        //input elements
        var usernameField = document.getElementById('username');
        var passwordField = document.getElementById('password');


        //set variables to value of user input 
        var username = usernameField.value;
        var password = passwordField.value;


        //reg, make, model, capacity,  are required
        if (username === "") {
            usernameErrorElement.innerHTML = "Please enter your username";
            valid = false;
        }

        if (password === "") {
            passwordErrorElement.innerHTML = "Please enter your password";
            valid = false;
        }


        //if not valid don't submit form 
        if (!valid) {
            event.preventDefault();
        }
    });

};