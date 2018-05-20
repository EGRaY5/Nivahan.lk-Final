<?php 
	require ('dbcon.php')
?>
<!doctype html>
<html lang = "en">

<head>
	<title>2nd year group project</title>
	<meta charset = "utf-8">
	<metaname="viewport" content="width=device-width, initial-scale=1">

	<!--this is for link css file-->
	<link rel="stylesheet" type="text/css" href="css/index.css">
	
	<!--//this is for link icons for site-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<!--//this is for link bootstrap to site-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<?php require('header.php');?>

		<div class="row" id="content">
			<div class="col-md-3">
			</div>	

			<div class="col-md-6">
				<div class="jumbotron">
				<form method="POST" action="log.php">
					<form>
						<div class="form-group">
						    <label for="uname">User Name</label>
						    <input type="text" name="uname"class="form-control">
						</div>

						<div class="form-group">
						    <label for="pwd">Password</label>
					        <input type="password" name="pw" class="form-control">
						</div>
						<button type="submit" class="btn btn-success">Login</button>
						<button type="reset" class="btn btn-danger">Forgot my Password</button>
					</form>
				</div>	
			</div>	

			<div class="col-md-3">
			</div>	
		</div>

<?php require('footer.php')?>