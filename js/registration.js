
$(function()
  {
   $("#name_error_message").hide();
    $("#surname_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();
    $("#retype_error_message").hide();
    $("#phone_error_message").hide();
    
    var error_name = false;
    var error_surname = false;
    var error_email = false;
    var error_phone = false;
    var error_password = false;
    var error_retype = false;
    
    $("#name").focusout(function()
                       {
                       check_name();
                        });
    $("#surname").focusout(function()
                       {
                       check_surname();
                        });
    $("#email").focusout(function()
                       {
                       check_email();
                        });
    $("#phone").focusout(function()
                       {
                       check_phone();
                        });
    $("#password").focusout(function()
                       {
                       check_password();
                        });
    $("#password1").focusout(function()
                       {
                       check_password1();
                        });
    function check_name()
    {
        var user_name=$("#name").val();
        
        //if(user_name.localeCompare("Name"))
        if (user_name=="Name" || user_name=="")
            {
                $("#name_error_message").html("Enter your name");
                $("#name_error_message").show();
                error_name=true;
            } else
            {
                $("#name_error_message").hide();
                error_name=false;
            }
    }
    function check_phone()
    {
        var user_phone=$("#phone").val();
        
        if (user_phone=="" || user_phone.length<7 || user_phone=="Phone number")
            {
              $("#phone_error_message").html("Invalid input");
                $("#phone_error_message").show();
                error_phone=true;
            } else
            {
                $("#phone_error_message").hide();
                error_phone=false;
            }
    }
    
    function check_surname()
    {
        var user_surname=$("#surname").val();
        
        //if(user_name.localeCompare("Name"))
        if (user_surname=="" || user_surname=="Surname" )
            {
                $("#surname_error_message").html("Enter your surname");
                $("#surname_error_message").show();
                error_surname=true;
            } else
            {
                $("#surname_error_message").hide();
                error_surname=false;
            }
    }
    function check_password()
    {
        var password= $("#password").val();
        
        if(password.length<8)
        {
          $("#password_error_message").html("At least 8 characters");
                $("#password_error_message").show();
                error_password=true;
            } else
            {
                $("#password_error_message").hide();
                error_password=false;
            }   
        }
        
        
    
   function check_password1()
    {
         var password= $("#password").val();
        var retype_password=$("#password1").val();
        
        if (password!=retype_password)
            {
                $("#retype_error_message").html("Doesn't match");
                $("#retype_error_message").show();
                error_retype=true;
            }
        else
            {
                $("#retype_error_message").hide();
                 error_retype=false;
            }
    }
    
    
    function check_email()
    {
        var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        
        if (pattern.test($("#email").val()))
            {
                $("#email_error_message").hide();
                error_email=false;
            }
        else
            {
                $("#email_error_message").html("Invalid address");
                $("#email_error_message").show();
                error_email=true;
            }
    }
    
    $("#registration_form").submit(
    function()
        {        
            check_name();
            check_email();
            check_surname();
            check_password1();
            check_password();
            check_phone();
            
            if (error_name==false && error_surname==false && error_email==false && error_password==false && error_retype==false && error_phone==false)
                {
                    return true;
                }
            else
                {
                    return false;
                }
        }
    
    )
    
});

