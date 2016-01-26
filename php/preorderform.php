<?php
	
	if($_POST['submit']){
		
		if(!$_POST['name']){
			$error = "<br /> Please Enter a Name";
		}

		if(!$_POST['email']){
			$error.="<br />Please Enter Your Email";
		}

		if($_POST['email'] != "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error.="<br />Please enter a valid email address";
		}

		if(!$_POST['payment']){
			$error.="<br />Please enter a payment type";
		}

		if(!$_POST['amount']){
			$error.="<br />Please enter an amount";
		}

		if($error){
			$result='<div class = "alert alert-danger"><strong>There were error(s) 
			in your form:</strong>'.$error.'</div>';
		} else {
			
			if(mail("contactpenpouch@gmail.com", "Pre-Order", 
				"Name: ".$_POST['name'].
				"Email: ".$_POST['email'].
				"Payment: ".$_POST['payment'].
				"Amount: ".$_POST['amount']))

				{
					$result='<div class = "alert alert-success"><strong>Thank You!
					</strong>We will be in Touch</div>';
		
			} else {
				$result= '<div class = "alert alert-danger"><strong>Whoops! Something went wrong!
				</strong> Please Try Again Later</div>';
			}	

	}
    }


?>
<!doctype html>
<html>
<head>
	<title>Pre-Order</title>
	<meta charset = "utf-8"/>
	<meta http-equiv="Content-type" content = "text/html; charset=utf-8"/>
	<link rel = "shortcut icon" href= "images/favicon.ico"/>
	<meta name ="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="This is the Pre-Order Form for Pen Pouch"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<style>
	.emailForm{
		border: 1px solid black;
		border-radius: 15px;
		margin-top:20px;
	}

	form{
		padding-bottom:20px;

	}

	</style>
    
    </head>
<body>

	<div class = "container">
	
	<div class = "row">

	<div class = "col-md-6 col-md-offset-3 emailForm">
	<h1>Get Your Pre-Orders Now!</h1>
	<?php echo $result; ?>

	<p class = "lead">Enter in your information to Pre-Order a Pen Pouch!</p>

	<form method = "post">

	<div class = "form-group">
	<label for="name">Your Name (first and last): </label>
	<input type = "text" name = "name" class="form-control" placeholder="First and Last Name" value="<?php echo $_POST['name']; ?>"/>
	</div>

	<div class = "form-group">
	<label for="email">Email Address </label>
	<input type = "email" name = "email" class="form-control" placeholder="Your Email Here" value="<?php echo $_POST['email']; ?>"/>
	</div>
	
	<div class = "form-group">
	<label for="payment">Payment Type</label>
	<input type = "text" name = "payment" class="form-control" placeholder="Ex. Cash, Check, Venmo" value="<?php echo $_POST['payment']; ?>"/>
	</div>

	<div class = "form-group">
	<label for="amount">Amount</label>
	<input type = "text" name = "amount" class="form-control" placeholder="Enter How Many You Want" value="<?php echo $_POST['amount']; ?>"/>
	</div>

	<input type="submit" name="submit" class = "btn btn-success btn-lg" value ="Submit"/>

	</form>

	</div>

	</div>

	</div>

	<script src=src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
