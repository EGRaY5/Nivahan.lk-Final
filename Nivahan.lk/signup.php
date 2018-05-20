<?php 
	require ('dbcon.php');
session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}
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
<?php
require('header.php');
?>
		<div class="row" id="content">
			<div class="col-md-3">
			</div>
			
			<div class="col-md-6">
				<div class="container-fluid">
				  <h2>SignUp</h2>
				  <ul class="nav nav-tabs">
				    <li class="active"><a href="#NormalUser">Normal User</a></li>
				    <li><a href="#Architect">Architect</a></li>
				    <li><a href="#Resercher">Researcher</a></li>
				  </ul>


				  <div class="tab-content">
				    <div id="NormalUser" class="tab-pane fade in active">
				    	<div class="row">
				    		<!--<h2>SignUp For Normal User</h2>-->
				    	<form method="POST" action="reg.php">
							    <div class="form-group">
							      <label for="usr">First Name</label>
							      <input type="text" name="fname" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Last Name</label>
							      <input type="text" name="lname" class="form-control" required>
							    </div>
                                
                                <div class="form-group">
							      <label for="usr">User Name</label>
							      <input type="text" name="uname" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Email</label>
							      <input type="email" name="em" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">NIC Number</label>
							      <input type="text" name="nic" class="form-control" required>
							    </div>
                                
							    <div class="form-group">
							      <label for="usr">Current district</label>
							      <input type="text" name="district" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="pwd">Password</label>
							      <input type="password" name="pw" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="pwd">Confirm Password</label>
							      <input type="password" name="cpw" class="form-control" required>
							    </div>
                                <?php
                                    $form_track = 1 ;
                                ?>
                                <button type="submit" class="btn btn-success">Sign Up</button>
                                <button type="reset" class="btn btn-info">Reset</button>
						    </form>
                            
						</div>  	
				    </div>
				    <div id="Architect" class="tab-pane fade">
				      <!--<h2>SignUp For Architect</h2>-->
				      	<form method="POST" action="reg1.php">
				      		<form>
							    <div class="form-group">
							      <label for="usr">First Name</label>
							      <input type="text" name="fname" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Last Name</label>
							      <input type="text" name="lname" class="form-control" required>
							    </div>

                                <div class="form-group">
							      <label for="usr">User Name</label>
							      <input type="text" name="uname" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Email</label>
							      <input type="email" name="em" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Architect Membership ID</label>
							      <input type="text" name="mid" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Practice Name</label>
							      <input type="text" name="pname" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Current district</label>
							      <input type="text" name="district" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Contact number</label>
							      <input type="text" name="number" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="pwd">Password</label>
							      <input type="password" name="pw" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="pwd">Confirm Password</label>
							      <input type="password" name="cpw" class="form-control" required>
							    </div>
                                <?php
                                $form_track = 2 ;
                                ?>
							    <button type="submit" class="btn btn-success">Sign Up</button>
                                <button type="reset" class="btn btn-info">Reset</button>
						    </form>
				    </div>
				    <div id="Resercher" class="tab-pane fade">
				      <!--<h2>SignUp For Researcher</h2>-->
				      		<form method="POST" action="reg2.php">
				      		<form>
							    <div class="form-group">
							      <label for="usr">First Name</label>
							      <input type="text" name="fname" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Last Name</label>
							      <input type="text" name="lname" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">User Name</label>
							      <input type="text" name="uname" class="form-control" required>
							    </div>							  

							    <div class="form-group">
							      <label for="usr">Email</label>
							      <input type="email" name="em" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Research Area</label>
							      <input type="text" name="rarea" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Researched University</label>
							      <input type="text" name="runi" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">University/School/Organization</label>
							      <input type="text" name="uni" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Qualification</label>
							      <input type="text" name="qualification" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="usr">Contact</label>
							      <input type="text" name="contact" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="pwd">Password</label>
							      <input type="password" name="pw" class="form-control" required>
							    </div>

							    <div class="form-group">
							      <label for="pwd">Confirm Password</label>
							      <input type="password" name="cpw" class="form-control" required>
							    </div>
                                <?php
                                $form_track = 3 ;
                                ?>
							    <button type="submit" class="btn btn-success">Sign Up</button>
                                <button type="reset" class="btn btn-info">Reset</button>
						    </form>
				    </div>
				  </div>
				</div>

				<script>
				$(document).ready(function(){
				    $(".nav-tabs a").click(function(){
				        $(this).tab('show');
				    });
				});
				</script>
			</div>

			<div class="col-md-3">
			</div>	

		</div>
        <?php
            $errors = array();
            $form_track = 0;
            //start validation


            if($form_track == 1){
                if (empty($_POST['fname'])){
                    $errors['fname1'] = "your first name cannot be empty";
                }
                if (empty($_POST['lname'])){
                    $errors['lname1'] = "your last name cannot be empty";
                }
                if (empty($_POST['uname'])){
                    $errors['uname1'] = "your user name cannot be empty";
                }
                if (empty($_POST['em'])){
                    $errors['em1'] = "your email cannot be empty";
                }
                if (empty($_POST['nic'])){
                    $errors['nic1'] = "your nic number cannot be empty";
                }
                if (empty($_POST['city'])){
                    $errors['city1'] = "your city cannot be empty";
                }
                if (empty($_POST['pw'])){
                    $errors['pw1'] = "your password cannot be empty";
                }
                if (empty($_POST['cpw'])){
                    $errors['cpw1'] = "your confirm password cannot be empty";
                }
                echo(count($errors));
                if (count($errors) == 0){
                    header("Location: reg.php");
                }

            }elseif($form_track == 2){
                header("Location: reg1.php");

            }elseif($form_track == 3){
                header("Location: reg2.php ");

            }







        ?>

		<div class="row" id="Footer">
    <div class = "col-md-3 col-xs-6">
        <h2>Latest Designs</h2>
        <ul>
            <li>Hypnotic Bridges</li>
            <li>Rotating Skyscrapers</li>
            <li>Indoor Parks</li>
            <li>Invisible Architecture</li>
        </ul>

    </div>

    <div class = "col-md-3 col-xs-6">
        <h2>Profiles</h2>
        <ul>
            <li>Architect</li>
            <li>Customer</li>
            <li>Researcher</li>
        </ul>

    </div>

    <div class = "col-md-3 col-xs-6">
        <h2>House Categories</h2>
        <ul>
            <li>Beach Houses</li>
            <li>Bunglow Houses</li>
            <li>Cottage Houses</li>
            <li>Contemporary Houses</li>

        </ul>

    </div>

    <div class = "col-md-3 col-xs-6">
        <h2>Contact Us</h2>
        <ul>
            <li>Mobile</li>
            <li>Email</li>
            <li>Office</li>
        </ul>

    </div>
</div>

</div>
</body>

</html>