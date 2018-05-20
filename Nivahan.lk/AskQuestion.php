 <?php 
session_start();
if (isset($_SESSION['log_count'])){
	$log_count = $_SESSION['log_count'];
}

// <?php 

		require('dbcon.php');

		$qErr ="";

		$type = @$_POST["type"];

		// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["detail"])) {
		    $qErr = "* Please type your Question";
		  } else {
		    $question = test_input($_POST["detail"]);
		    // check if question is entered
		    
		  }
		// }

		// $question = @$_POST["detail"];
		$name = @$_POST["name"];
		$email = @$_POST["email"];

		// function test_input($data) {
		//   $data = trim($data);
		//   $data = stripslashes($data);
		//   $data = htmlspecialchars($data);
		//   return $data;
		// }

		if (isset($_POST['submit'])) {           
			if (empty($_POST["detail"])) {?>
			<script>
		function mf() {
		    alert("New Question submitted successfully !");
		}
		function mf2(){
			alert("Please Enter a Question !!");
		}
		mf2();
	</script> 
	<?php

		    
		  } else {
		    $question = test_input($_POST["detail"]);
		    // check if question is entered
		    $sql = "INSERT INTO question (question,userName)      
			VALUES ('$question','".$_SESSION['uname']."')";    //Insert non-empty question into the table

			if (mysqli_query($conn, $sql)) {
   			// echo "New record created successfully";?>
   	<script>
		function mf() {
		    alert("New Question submitted successfully !");
		}
		function mf2(){
			alert("Please Enter a Question !!");
		}
		mf();
	</script> 
<?php
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		}
		    
		

		
	}


 ?>
<!doctype html>
<html lang = "en">

<head>
	<title>2nd year group project</title>
	<meta charset = "utf-8">
	<metaname ="viewport" content="width=device-width, initial-scale=1">

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
		<div class="row">
			<center>
				<div class="row">
					<form class="navbar-form ">
						<!-- <div class="col-sm-3 col-md-6 col-lg-4" ;">
						<button type="button">  Ask Question  </button>
					</div> -->
				      <!-- <div class="form-group">
				        <input type="text" class="form-control" placeholder="Search Question">
				      
				      <button type="submit" class="btn btn-default" > SEARCH </button>
				      </div> -->
				      
				    </form>

				</div>
			</center>
			<div>
				
			</div>
			

		<!-- <p><span class="error">* required field.</span></p> -->

		<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
		<form id="form1" name="form1" method="post" action="<?php if (empty($_POST["detail"])) {echo "AskQuestion.php";}   ?>" >
		<td>
		<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
		<tr>
		<!-- <td colspan="8" bgcolor="#E6E6E6"><strong>Create New Topic</strong> </td> -->
		</tr>
		<tr>
		<td>
			<?php echo "<br />"; ?>
		</td></tr>
		 
		 <tr>
		 <td>
		 	<?php echo "<br />"; ?>
		 </td>
		 	</tr>

		<tr>	
		<td valign="top"><strong>Question</strong></td>
		<td valign="top">:</td>
		<td><textarea name="detail" cols="100" rows="10" id="detail" placeholder="Type your Question"></textarea></td>
		 <!-- <input type="text" class="form-control" placeholder="Search Question"> -->
		 <!-- <span class="error"> <?php //echo $qErr;?></span>	 -->
		
		
		</tr>
		<tr>
			
		<td>
		 	<span class="error"><?php echo $qErr;?></span>
		 </td>
		</tr>
		
		<tr><td>
			<?php echo "<br />"; ?>
		</td></tr>
		<!-- <tr>
		<td><strong>Name</strong></td>
		<td>:</td>
		<td><input name="name" type="text" id="name" size="50" /></td>
		</tr>
		<tr>
			<td>
				// <?php echo "<br />"; ?>
			</td>
		</tr>
		<tr>
		<td><strong>Email</strong></td>
		<td>:</td>
		<td><input name="email" type="text" id="email" size="50" /></td>
		</tr> -->
		<tr><td>
			<?php echo "<br />"; ?>
		</td></tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
		<input type="submit" name="submit" value="Submit"  />
		<!-- <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Open Modal</button>


		 
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Required Problem :</h4>
		        </div>
		        <div class="modal-body">
		          <p>Some text in the modal.</p>

		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div> -->


		<!-- <script>
		function mf() {
		    alert("New Question submitted successfully !");
		}
		function mf2(){
			alert("Please Enter a Question !!");
		}
		</script>  -->
		<input type="reset" name="Submit2" value="Reset" /></td>
		</tr>
		</table>
		</td>
		</form>
		</tr>			
		</table>

		


		<div class="row" id="Footer">
				<div class = "col-md-3 col-xs-6">
				<center>
					<h2>Latest designs</h2>
					<ul>
    				<li>Spring</li>   					
    				<li>Summer</li>
   					<li>Autumn</li>
    				<li>Winter</li>
    				</ul>
    			</center>

				</div>

				<div class = "col-md-3 col-xs-6">
				<center>
					<h2>Profiles</h2>
					<ul>
    				<li>Augest 2010</li>   					
    				</ul>
    			</center>

				</div>

				<div class = "col-md-3 col-xs-6">
				<center>
					<h2>House Categories</h2>
					<ul>
    				<li>Spring</li>   					
    				<li>Summer</li>
   					<li>Autumn</li>
    				<li>Winter</li>
    				<li>design</li>
    				</ul>
    			</center>

				</div>

				<div class = "col-md-3 col-xs-6">
				<center>
					<h2>Contact US</h2>
					<ul>
    				<li>Mobile</li>   					
    				<li>E-Mail</li>
   					<li>Office</li>
    				</ul>
    			</center>
				</div>
		</div>

	</div>	
</body>

</html>