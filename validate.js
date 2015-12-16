window.onload = function() {
    
    function isValidDateFormat(date){
        var re = /^\d{4}\-\d{2}\-\d{2}$/;
        return re.test(date);
    }
    
    function isDate(date){
        var parts = date.split("-");
        var day = parseInt(parts[2], 10);
        var month = parseInt (parts[1], 10);
        var year = parseInt (parts[0], 10)
        
        var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    
        if (year % 400 === 0 || (year % 100 !=0 && year %4 ===0)){
            monthLength[1] = 29;
        }
        
        return(year >= 1999 && year <= 2150 
               && month >= 1 && month <= 12 && 
               day >= 1 && day <= monthLength[month - 1]);
    
    }
    
    function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

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
        var facilitiesField = document.getElementsByName('facilities[]');
        var latenightField = document.getElementsByName('latenight');
        
        //set variables to value of user input 
        var name = nameField.value;
        var mname = managerNameField.value;
        var address = addressField.value;
        var email = emailField.value;
        var phone = phoneField.value;
        var ophrs = ophrsField.value;
        var opdate = opdateField.value;
        var facilities = facilitiesField.value;
        var latenight = latenightField.value;
        
        //name, manager name and address are required
        if (name === ""){
            nameErrorElement.innerHTML = "Name cannot be blank";
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
        
        if (opdate !== "" && !isValidDateFormat(opdate)){
        opdateErrorElement.innerHTML = "Opening date must be in the format YYYY-MM-DD";
        valid = false; 
    }
        else if (opdate != "" && !isDate(opdate)){
            opdateErrorElement.innerHTML = "Please enter a valid date";
            valid = false;
        }
        
        if(email !== "" && !validateEmail(email)){
            emailErrorElement.innerHTML = "Please enter a valid email";
            valid = false;
        }
        
        var latenightselected = false;
        for(var i =0; i!==latenight.length; i++){
            if(latenight[i].checked){
                latenightselected = true;
                break;
            }
        }
        
        if(!latenightselected){
            latenightErrorElement.innerHTML = "Choose an option";
            valid = false;  
        }
        
        //if not valid don't submit form 
        if(!valid){
            event.preventDefault();
        }
    });
    
};