<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		.err_span
		{
			color:red;

		}
		.err_span p
		{
			padding-top: 5px;
		}
		#form
		{
			margin-top: 10%;	
		}
	</style>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile settings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<form class="form-horizontal" id="form" action="">
			  	<div class="form-group has-feedback nameBlock">
				  <label class="control-label col-sm-2" for="name">Name</label>
				  <div class="col-sm-6 for-span-name">
				  	<input type="text" class="form-control" id="name" aria-describedby="inputSuccess2Status">
				  </div>
				  <div class="col-sm-2">
				  	<span id="name-error" class = "err_span"><p></p></span>
				  </div>
			  	</div>
				<div class="form-group has-feedback emailBlock">
				  <label class="control-label col-sm-2" for="email">Email</label>
				  <div class="col-sm-6 for-span-email">
				  	<input type="text" class="form-control" id="email" aria-describedby="inputSuccess2Status">
				  </div>
				  <div class="col-sm-2" >
				  	<span id="email-error" class = "err_span"><p></p></span>
				  </div>
			  	</div>
			  	<div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Submit</button>
				    </div>
				</div>
			</form>
		</div>
	</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	
	$(document).ready(function(){
		var validName=false;
		var validEmail = false;
		$("#name-error").hide();
		$("#email-error").hide();
		$("#name").focusout(function()
    {
        check_name();
    });

	$("#email").focusout(function()
	    {
	        check_email();
	    });


		$("form").submit(function(event){
			event.preventDefault(); // предотвратить отправку форму по умолчанию  
			if(validEmail==true && validName==true)
			{
				$("form").unbind('submit').submit();//разрешить передачу формы

			}
		});

		function check_name(){

			var name = $("#name").val();
			if(name=="")
			{
				$("#name").parent().removeClass("has-success").addClass("has-error");
				$(".for-span-name").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$("#name-error").html("Fill this field");
				$("#name-error").show();
				$('.glyphicon-ok').remove();
				validName = false;
			}else{
				$("#name").parent().removeClass("has-error").addClass("has-success");
				
				$(".for-span-name").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.for-span-name .glyphicon-remove').remove();
				$("#name-error").hide();
				validName = true;
			}

		}

		function check_email(){
			var email = $("#email").val();

			
			if(email == "")
			{
				
				$("#email").parent().removeClass("has-success").addClass("has-error");
				$(".for-span-email").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$("#email-error").html("Fill this field");
				$("#email-error").show();
				$('.glyphicon-ok').remove();
				validEmail= false;
			}else{
				$("#email").parent().removeClass("has-error").addClass("has-success");
				
				$(".for-span-email").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.emailBlock .glyphicon-remove').remove();
				$("#email-error").hide();
				validEmail=true;
			}

			var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
			if (pattern.test($("#email").val()))
            {
               $("#email").parent().removeClass("has-error").addClass("has-success");
				
				$(".for-span-email").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.for-span-email .glyphicon-remove').remove();
				$("#email-error").hide();
				validEmail=true;
            }
        else
            {
                $("#email").parent().removeClass("has-success").addClass("has-error");
				$(".for-span-email").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$("#email-error").html("Wrong email address");
				$("#email-error").show();
				$('.emailBlock .glyphicon-ok').remove();
				validEmail= false;
            }

		}

	});
</script>

</body>
</html>