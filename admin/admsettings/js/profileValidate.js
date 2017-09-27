$(document).ready(function(){
	//alert("ready");
	var error_name = false;
	var error_email=false;
	$("#name_1").focusout(function()
    {
        check_name();
    });

	$("#email_1").focusout(function()
    {
        check_email();
    });

$("#profile-form").submit(
    function()
        {        
            check_name();
            check_email();
            
            if (error_name==false && error_email==false)
                {
                    return true;
                }
            else
                {
                    return false;
                }
        }
    
    )
    /*$("#profile-form").submit(function()
    {
    	var error_name = false;
	var error_email=false;
    	check_email();
    	check_name();

    	if (error_email==false && error_name==false){
    	$.ajax({
            type: "POST",
            url: "controller/adminProfileController.php",
            data: $(this).serialize()}).done(function(){
            alert("Thank you, the form has been accepted! ");
        });
        return false;
 		}else
 		{
 			alert("Incrorrect input");
 		}	
    })*/


});


function check_name()
{
	var user_name = $("#name_1").val();
        //if(user_name.localeCompare("Name"))
        if (user_name=="")
            {
                $("#name-span").html("Fill the field");
                $("#name-span").show();
                error_name=true;
            } else
            {
                $("#name-span").hide();
                error_name=false;
            }
}

function check_email()
    {
        var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        var user_email = $("#email_1").val();
        if (pattern.test($("#email_1").val()))
            {
                $("#email-val").hide();
                error_email=false;
            }
        else
            {
                $("#email-val").html("Invalid address");
                $("#email-val").show();
                error_email=true;
            }
        if(user_email=="")
        {
        	$("#email-val").html("Fill the field");
                $("#email-val").show();
                error_email=true;
            }
            else
            	{
            		$("#email-val").hide();
                	error_email=false;	
            	}    

    }


function sumt(){
	if (error_name==false && error_email==false)
	{
	    $.ajax({
	        type: "POST",
	        url: "controller/adminProfileController.php",
	        data: $(this).serialize()}).done(function(){
	        alert("Thank you, the form has been accepted! ");
	        });
	        return false;
	}
}