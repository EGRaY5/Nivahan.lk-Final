<?php
	require ('dbcon.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$em = $_POST['em'];
$rarea = $_POST['rarea'];
$runi = $_POST['runi'];
$uni = $_POST['uni'];
$qualification = $_POST['qualification'];
$contact = $_POST['contact'];
$pw = $_POST['pw'];
$cpw = $_POST['cpw'];
$utype = 3;

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

	$sql1 = "INSERT INTO researcher (firstName,lastName,userName,email,researchArea,uni_research,university,qualification,contact) VALUES ('$fname','$lname','$uname','$em','$rarea','$runi','$uni','$qualification','$contact')";

	$res1 = mysqli_query($conn,$sql1);

	$sql2 = "INSERT INTO user (userName,password,userType) VALUES ('$uname','$pw','$utype')";

	$res2 = mysqli_query($conn,$sql2);

	echo "Inserted!";
	header("location: login.php");

}
}





?>