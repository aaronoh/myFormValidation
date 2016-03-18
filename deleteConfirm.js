window.onload = function () {
    //when the delete button is pressed display an alert warning the user, if they do not click 'confirm' prevent the default action (deleting the entry)
    var deleteRow = document.getElementsByClassName("delete_btn");

    for (var i = 0; i < deleteRow.length; i++) {
        deleteRow[i].addEventListener("click", function (event) {
            if (!confirm("Are you sure you want to delete this entry?")) {
                event.preventDefault();
            }
        });

    }
};