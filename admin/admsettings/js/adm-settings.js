$(document).ready(function(){
	$("#ch-pwd").click(function(){
        $("#pwd-panel").slideToggle("slow");
    });

		var validName=false;
		var validEmail = false;
		var validOldPwd = false;
		var validNewPwd = false;
		var validRepPwd=false;
		var validMatch=false;
		$("#name-error").hide();
		$("#email-error").hide();
		$('#Oldpwd-error').hide();
		$('#new-pwd-error').hide();
		$('#rep-pwd-error').hide();

		
$("#Oldpassword").focusout(function()
    {
      
        check_old_password();
    });

		$("#name_1").focusout(function()
    {
        check_name();
    });


	$("#email_1").focusout(function()
	    {
	        check_email();
	    });

$("#password").focusout(function()
	    {
	        check_new_pwd();
	    });
$("#password2").focusout(function()
	    {
	        check_repeat();
	    });

		$("#profile-form").submit(function()
    {
    	event.preventDefault();
    	check_name();
		check_email();
		if(validEmail==true && validName==true)
			{
		$("#profile-form").unbind('submit');//разрешить передачу формы

        $.ajax({
            type: "POST",
            url: "controller/adminProfileController.php",
            data: $(this).serialize()}).done(function(){
            alert("Changes saved");
        });
        return false;
        }
    });

		
    $("#psswChange").submit(function(event){
			event.preventDefault(); // предотвратить отправку форму по умолчанию  
		//	check_repeat();
		//	check_new_pwd();
			//check_old_password();
			if(validOldPwd==true && validNewPwd==true && validRepPwd==true && validMatch==true)
			{
        alert("ffsdf");
				$("#psswChange").unbind('submit').submit();//разрешить передачу формы
			}
		});


		function check_name(){

			var name = $("#name_1").val();
			if(name=="")
			{
				$("#name_1").parent().removeClass("has-success").addClass("has-error");
				$(".for-span-name").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$("#name-error").html("Please fill this field");
				$("#name-error").show();
				$('.glyphicon-ok').remove();
				validName = false;
			}else{
				$("#name_1").parent().removeClass("has-error").addClass("has-success");
				
				$(".for-span-name").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.for-span-name .glyphicon-remove').remove();
				$("#name-error").hide();
				validName = true;
			}

		}

		function check_email(){
			var email = $("#email_1").val();

			
			if(email == "")
			{
				
				$("#email_1").parent().removeClass("has-success").addClass("has-error");
				$(".for-span-email").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$("#email-error").html("Please this field");
				$("#email-error").show();
				$('.glyphicon-ok').remove();
				validEmail= false;
			}else{
				$("#email_1").parent().removeClass("has-error").addClass("has-success");
				
				$(".for-span-email").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.emailBlock .glyphicon-remove').remove();
				$("#email-error").hide();
				validEmail=true;

				var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
			if (pattern.test($("#email_1").val()))
            {
               $("#email_1").parent().removeClass("has-error").addClass("has-success");
				
				$(".for-span-email").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.for-span-email .glyphicon-remove').remove();
				$("#email-error").hide();
				validEmail=true;
            }
        else
            {
                $("#email_1").parent().removeClass("has-success").addClass("has-error");
				$(".for-span-email").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$("#email-error").html("Wrong email address");
				$("#email-error").show();
				$('.emailBlock .glyphicon-ok').remove();
				validEmail= false;
            }
			}
		}


		function check_old_password()
    {
      var old_pwd = $("#Oldpassword").val();

      if(old_pwd == "" || old_pwd.length<8)
      {

     	 $("#Oldpassword").parent().removeClass("has-success").addClass("has-error");
        $(".for-span-oldPwd").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
        $("#Oldpwd-error").html("Enter at least 8 symbols");
        $("#Oldpwd-error").show();
        $('.glyphicon-ok').remove();
        validOldPwd = false;
      }else
      {
        $("#Oldpassword").parent().removeClass("has-error").addClass("has-success");
        
        $(".for-span-oldPwd").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
        $('.for-span-oldPwd .glyphicon-remove').remove();
        $("#Oldpwd-error").hide();
        validOldPwd = true;
      }
    }

    function check_new_pwd(){
    	var old_pwd = $("#password").val();

    	if(old_pwd == "" || old_pwd.length<8)
      {

     	 $("#password").parent().removeClass("has-success").addClass("has-error");
        $(".for-span-newPwd").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
        $("#new-pwd-error").html("Enter at least 8 symbols");
        $("#new-pwd-error").show();
        $('.glyphicon-ok').remove();
        validNewPwd = false;
      }else
      {
        $("#password").parent().removeClass("has-error").addClass("has-success");
        
        $(".for-span-newPwd").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
        $('.for-span-newPwd .glyphicon-remove').remove();
        $("#new-pwd-error").hide();
        validNewPwd = true;
      }
    }

   function check_repeat()
    {
    	var rep_pwd = $("#password2").val();
    	var new_pwd = $("#password").val();
    	if(rep_pwd == "" || rep_pwd.length<8)
      {

     	 $("#password2").parent().removeClass("has-success").addClass("has-error");
        
        $(".for-span-repPwd").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
        $("#rep-pwd-error").empty();
        $("#rep-pwd-error").html("Enter at least 8 symbols");
        $("#rep-pwd-error").show();
        $('.glyphicon-ok').remove();
        validRepPwd = false;
      }
      else{
        if(rep_pwd!=new_pwd)
      {
        alert("not equal");
        $("#password2").parent().removeClass("has-success").addClass("has-error");
        $(".for-span-repPwd").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
        $("#rep-pwd-error").empty();
        $("#rep-pwd-error").html("Password doesn't match");
        $("#rep-pwd-error").show();
        $('.glyphicon-ok').remove();
        validRepPwd = false;
      } else
      if(rep_pwd==new_pwd){

              $("#password").parent().removeClass("has-error").addClass("has-success");
              
              $(".for-span-repPwd").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
              $('.for-span-repPwd .glyphicon-remove').remove();
              $("#rep-pwd-error").hide();
              validRepPwd = true;
              alert("its okay");
            }

      }

      
    }
    

	});