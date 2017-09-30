$(function(){
$("#name_1").focusout(function()
    {
        check_name();
    });

$("#email_1").focusout(function()
    {
        check_email();
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

        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var user_email = $("#email_1").val();
        if (reg.test(user_email) == false) 
        {
            //alert('Invalid Email Address');
            $("#email-val").html("Invalid address");
                $("#email-val").show();
                error_email=true;
        }else
        {
            $("#email-val").hide();
                error_email=false;
        }

        

     // var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
     /* var user_email = $("#email_1").val();
        if (pattern.test(user_email))
            {
                $("#email-val").hide();
                error_email=false;
            }
        else
            {
                $("#email-val").html("Invalid address");
                $("#email-val").show();
                error_email=true;
            }*/
        
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

$("#profile-form").submit(
    function()
        {        
          alert("Submit button is pressed");
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
    
    );

});