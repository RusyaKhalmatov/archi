$(document).ready(function(){
         $("#name").blur(function(){
            name_val();
        });


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
    
    
});

    /*function validateForm()
    {
        var form = document.getElementById("orderForm");
        var email = form.elements[0].value;
        var name = form.elements[1].value;
        var surname = form.elements[2].value;
        if(email.length>0 )
            {
                form.action="orderFormHandler.php"
                form.submit;
            }else{
                alert("Please fill all the fields");
            }*/
    
    function name_val(){
    
        var name_length = $('#name').val().length;
        if(name_length<5)
        {
            $("#name_span").html("The name should be greater");
            $("#name_span").show();
        }
        else
        {
            $("#name_span").hide();
        }
    }