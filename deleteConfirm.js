window.onload = function () {
    var deleteRow = document.getElementsByClassName("delete_btn");
    
    for(var i = 0; i< deleteRow.length; i++){
       deleteRow[i].addEventListener("click", function (event) {
        if(!confirm("Are you sure you want to delete this entry?")){
            event.preventDefault();
        }
    });
           
    }
};