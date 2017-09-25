<!DOCTYPE html>
<html>
<head>
	<title>Order Form</title>
	<meta charset = "utf-8">
 <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
<link rel="stylesheet" href="css/formStyle.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="js/orderFormScript.js"></script>
</head>
<body>
<div class="container">
	<div class="row" >
		<form id="orderForm" class="form-horizontal" style="width: 80%; margin-top: 25%; margin-left: 18%;">
			<div class="form-group">
			    <label class="control-label col-sm-2" for="email">Email:</label>
			    <div class="col-sm-8">
			      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
			    </div>
			    <div class="col-sm-2">
			    	<span class="error-user"></span>
			    </div>
			    
		  </div>
		  <div class="form-group">
			    <label class="control-label col-sm-2" for="name">Name:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
			    </div>
			    <div class="col-sm-2">
			    	<span class="error-user" id="name_span"></span>
			    </div>
		  </div>
		  <div class="form-group">
			    <label class="control-label col-sm-2" for="surname">Surname:</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" required>
			    </div>
			    <div class="col-sm-2">
			    	<span class="error-user"></span>
			    </div>

		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Submit</button>
		    </div>
  		  </div>
		</form>

	</div>
</div>

<script type="text/javascript">
	
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
		}
		else
		{
			$("#name_span").hide();
		}
	}
</script>

</body>
</html>


