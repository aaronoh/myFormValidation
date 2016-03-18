window.onload = function () {


    var submitBtn = document.getElementById('Register');

    submitBtn.addEventListener("click", function (event) {
        var valid = true;
        //error elements
        var usernameErrorElement = document.getElementById("usernameError");
        var passwordErrorElement = document.getElementById("passwordError");
        var password2ErrorElement = document.getElementById("password2Error");

        //set errrors to empty string
        usernameErrorElement.innerHTML = "";
        passwordErrorElement.innerHTML = "";
        password2ErrorElement.innerHTML = "";


        //input elements
        var usernameField = document.getElementById('username');
        var passwordField = document.getElementById('password');
        var password2Field = document.getElementById('password2');


        //set variables to value of user input 
        var username = usernameField.value;
        var password = passwordField.value;
        var password2 = password2Field.value;


         //username password and password confirmtaion are required
        if (username === "") {
            usernameErrorElement.innerHTML = "Please enter a username";
            valid = false;
        }

        if (password === "") {
            passwordErrorElement.innerHTML = "Please enter your password";
            valid = false;
        }

        if (password2 === "") {
            password2ErrorElement.innerHTML = "Please confirm your password";
            valid = false;
        }

        if (password !== password2) {
            password2ErrorElement.innerHTML = "Passwords Do Not Match";
            valid = false;
        }



        //if not valid don't submit form 
        if (!valid) {
            event.preventDefault();
        }
    });

};