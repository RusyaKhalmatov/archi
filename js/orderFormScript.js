$(document).ready(function(){
    
    $("#orderForm").submit(function()
    {
        $.ajax({
            type: "POST",
            url: "orderFormHandler.php",
            data: $(this).serialize()}).done(function(){
            alert("Thank you, the form has been accepted! ");
        });
        return false;
    })
    
    
})