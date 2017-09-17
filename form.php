<!DOCTYPE html>
<html>
<head>
	<title>Order Form</title>
	<meta charset = "utf-8">
 <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">

 <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
</head>
<body>
<div class="container">
	<div class="row">
		<form id="orderForm" class="form-horizontal" style="width: 40%; margin-top: 25%; margin-left: 18%;">
			<div class="form-group">
			    <label class="control-label col-sm-2" for="email">Email:</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
			    </div>
		  </div>
		  <div class="form-group">
			    <label class="control-label col-sm-2" for="name">Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
			    </div>
		  </div>
		  <div class="form-group">
			    <label class="control-label col-sm-2" for="surname">Surname:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" required>
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
<script src="js/orderFormScript.js"></script>
<script type="text/javascript">
	
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
	}
</script>

</body>
</html>

