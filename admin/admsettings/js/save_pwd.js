$(document).ready(function(){

		var validOldPwd = false;
		var validNewPwd = false;
		var validRepPwd=false;
		var validMatch=false;

		$('#Oldpwd-error').hide();
		$('#new-pwd-error').hide();
		$('#rep-pwd-error').hide();



		$("#Oldpassword").focusout(function()
    {
      
        check_old_password();
    });

$("#password").focusout(function()
	    {
	        check_new_pwd();
	    });
$("#password2").focusout(function()
	    {
	        check_repeat();
	    });


$("#psswChange").submit(function(event){
			event.preventDefault(); // предотвратить отправку форму по умолчанию  
			if(validOldPwd==true && validNewPwd==true /*&& validRepPwd==true && validMatch==true*/)
			{
        
				$("#psswChange").unbind('submit').submit();//разрешить передачу формы
			}
		});


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
              
            }

      }

      
    }

});