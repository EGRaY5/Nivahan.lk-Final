<?php
	require ('dbcon.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$em = $_POST['em'];
$mid = $_POST['mid'];
$pname = $_POST['pname'];
$district = $_POST['district'];
$number = $_POST['number'];

$pw = $_POST['pw'];
$cpw = $_POST['cpw'];
$utype = 2;

if ($pw == $cpw) {
	$pw = md5($pw);

	$query = "SELECT userName FROM user WHERE userName = '$uname'";

	$res = mysqli_query($conn,$query);

	if (mysqli_num_rows($res)>0) {
        echo '<script type="text/javascript">'; 
            echo 'alert("user already exist");'; 
            echo 'window.location.href = "signup.php";';
            echo '</script>';
	} else {

	$sql1 = "INSERT INTO architect (firstName,lastName,userName,email,m_id,Practice_Name,District,Contact_no) VALUES ('$fname','$lname','$uname','$em','$mid','$pname','$district','$number')";


	$res1 = mysqli_query($conn,$sql1) or die(mysqli_error($res1));
	
        $sql2 = "INSERT INTO user (userName,password,userType) VALUES ('$uname','$pw','$utype')" ;

        $res2 = mysqli_query($conn,$sql2 ) or die(mysqli_error($res2));

    header("location: login.php");

	}
	}
?>