<?php
	
	if($_POST['submit']){
	
		if(!$_POST['name']){
			$error = "<br />Please Enter Your Name";
		}
	
		if(!$_POST['email']){
			$error.= "<br />Please Enter Your Email";
		}

		if(!$_POST['comments']){
			$error.= "<br />Please Enter a Comment";
		}

		if($_POST['email'] != "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error.="<br />Please enter a valid email address";
		}

		if ($error){
			$result='<div class = "alert alert-danger"><strong>There were error(s)
			in your form:</strong>'.$error.'</div>';

		} else {
			
			if(mail("contact@penpouch.co", "Comment via Website", 
				"Name: ".$_POST['name']. 
				"Email: ".$_POST['email'].
				"Comments: ".$_POST['comments']))

				{
					$result='<div class = "alert alert-success"><strong>Thank You!
					</strong>We will be in Touch</div>';

			
			} else {
				
				$result = '<div class = "alert alert-danger"><strong>Whoops! Something
				went wrong!</strong> Please Try again Later</div>';


			}

		}
	}



?>
<!doctype html>
<html>
<head>
	<title>Contact Us!</title>
	<meta charset ="utf-8"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<link rel = "shortcut icon" href = "images/favicon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	
	<style>
	.emailForm {
		border: 1px solid grey;
		border-radius:10px;
		margin-top:20px;
	}

	form{
		padding-bottom:20px;

	}

	</style>

<body>

	<div class = "container">
	
	<div class="row">

	<div class = "col-md-6 col-md-offset-3 emailForm">
	<h1>Contact Pen Pouch</h1>
	<?php echo $result; ?>
	
	<p class ="lead">Please get in touch - We'll get back to you as soon as we can.</p>

	<form method ="post">

	<div class = "form-group">
	<label for="name">Your Name: </label>
	<input type = "text" name = "name" class="form-control" placeholder="Your Name Here" value = "<?php echo $_POST['name']; ?>"/>
	</div>

	<div class = "form-group">
	<label for="email">Your Email: </label>
	<input type = "email" name ="email" class="form-control" placeholder="Your Email Here" value = "<?php echo $_POST['email']; ?>"/>
	</div>

	<div class = "form-group">
	<label for="comment">Comments: </label>
	<input type="text" name ="comments" class="form-control" placeholder="Comments?" value = "<?php echo $_POST['comments']; ?>"/>
	</div>

	<input type="submit" name="submit" class="btn btn-success btn-lg" value ="Submit"/>

	</form>

	</div>

	</div>

	</div>

	<script src=src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
