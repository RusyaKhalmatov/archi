<!DOCTYPE html>
<html lang="en">
<head>
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
				  <label class="control-label" for="name">Name</label>
				  <input type="text" class="form-control" id="name" aria-describedby="inputSuccess2Status">
			  	</div>
				<div class="form-group has-feedback emailBlock">
				  <label class="control-label" for="email">Email</label>
				  <input type="text" class="form-control" id="email" aria-describedby="inputSuccess2Status">
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

		$("form").submit(function(event){
			event.preventDefault(); // предотвратить отправку форму по умолчанию  

			var name = $("#name").val();
			var email = $("#email").val();

			if(name=="")
			{
				$("#name").parent().removeClass("has-success").addClass("has-error");
				$(".nameBlock").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$('.glyphicon-ok').remove();
				validName = false;
			}else{
				$("#name").parent().removeClass("has-error").addClass("has-success");
				
				$(".nameBlock").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.nameBlock .glyphicon-remove').remove();
				validName = true;
			}
			if(email == "")
			{
				
				$("#email").parent().removeClass("has-success").addClass("has-error");
				$(".emailBlock").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$('.glyphicon-ok').remove();
				validEmail= false;
			}else{
				$("#email").parent().removeClass("has-error").addClass("has-success");
				
				$(".emailBlock").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.emailBlock .glyphicon-remove').remove();
				validEmail=true;
			}

			var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
			if (pattern.test($("#email").val()))
            {
               $("#email").parent().removeClass("has-error").addClass("has-success");
				
				$(".emailBlock").append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
				$('.emailBlock .glyphicon-remove').remove();
				validEmail=true;
            }
        else
            {
            	alert("Wrong email address");
                $("#email").parent().removeClass("has-success").addClass("has-error");
				$(".emailBlock").append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
				$('.glyphicon-ok').remove();
				validEmail= false;
            }


			if(validEmail==true && validName==true)
			{
				$("form").unbind('submit').submit();//разрешить передачу формы

			}else{


			}
		});

		function check_name(){

			
		}

	});
</script>

</body>
</html>