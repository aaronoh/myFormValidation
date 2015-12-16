window.onload = function() {
    var submitBtn = document.getElementById('submit');
    
    submitBtn.addEventListener("click", function (event){
        
        var valid = true;
        //error elements
        var nameErrorElement = document.getElementById("nameError");
        var managerNameErrorElement = document.getElementById("mnameError");
        var addressErrorElement = document.getElementById("addressError");
        var emailErrorElement = document.getElementById("emailError");
        var phoneErrorElement = document.getElementById("phoneError");
        var ophrsErrorElement = document.getElementById("ophrsError");
        var opdateErrorElement = document.getElementById("opdateError");
        var facilitiesErrorElement = document.getElementById("facilitiesError");
        var latenightErrorElement = document.getElementById("latenightError");
        
        //set errrors to empty string
        nameErrorElement.innerHTML = "";
        managerNameErrorElement.innerHTML = "";
        addressErrorElement.innerHTML = "";
        emailErrorElement.innerHTML = "";
        phoneErrorElement.innerHTML = "";
        ophrsErrorElement.innerHTML = "";
        opdateErrorElement.innerHTML = "";
        facilitiesErrorElement.innerHTML = "";
        latenightErrorElement.innerHTML = "";
        
        //input elements
        var nameField = document.getElementById('name');
        var managerNameField = document.getElementById('mname');
        var addressField = document.getElementById('address');
        var emailField = document.getElementById('email');
        var phoneField = document.getElementById('phone');
        var ophrsField = document.getElementById('ophrs');
        var opdateField = document.getElementById('opdate');
        var facilitiesField = document.getElementByName('facilities[]');
        var latenightField = document.getElementByName('latenight');
        
        var name = nameField.value;
        var mname = managerNameField.value;
        var address = addressField.value;
        var email = emailField.value;
        var phone = phoneField.value;
        var ophrs = ophrsField.value;
        var opdate = opdateField.value;
        var facilities = facilitiesField.value;
        var latenight = latenightField.value;
        
        if (name === ""){
            nameErrorElement.innerHTML = "Name cannot be blankjs";
            valid = false;
        }
        
        if (mname === ""){
            managerNameErrorElement.innerHTML = "Manager Name cannot be blank";
            valid = false;
        }
        
        if (address === ""){
            addressErrorElement.innerHTML = "Address cannot be blank";
            valid = false;
        }
        
        
        if(!valid){
            event.preventDefault();
        }
    });
    
};