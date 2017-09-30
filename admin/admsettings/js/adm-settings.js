$(document).ready(function(){
		
		$("#ch-pwd").click(function(){
        $("#pwd-panel").slideToggle("slow");
    });

		var validName=false;
		var validEmail = false;
		$("#name-error").hide();
		$("#email-error").hide();
		$("#name_1").focusout(function()
    {
        check_name();
    });

	$("#email_1").focusout(function()
	    {
	        check_email();
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
    })



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

	});