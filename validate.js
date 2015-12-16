window.onload = function() {
    var submitBtn = document.getElementById('submit');
    
    submitBtn.addEventListener("click", function (event){
        
        var valid = true;
        
        if(!valid){
            event.preventDefault();
        }
    });
    
};