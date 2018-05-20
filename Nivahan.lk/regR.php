<?php
	require ('dbcon.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$em = $_POST['em'];
$nic = $_POST['nic'];
$city = $_POST['city'];
$pw = $_POST['pw'];
$cpw = $_POST['cpw'];

if ($pw == $cpw) {
	$pw = md5($pw);

	$query = "SELECT * FROM normaluser WHERE userName = '$uname'";

	$res = mysqli_query($conn,$query);

	if (mysqli_num_rows($res)>0) {
		echo "User already exists!";
	} else {

	$sql1 = "INSERT INTO normaluser (userName, firstName,lastName,email,nic,city) VALUES ('$fname','$lname','$uname','$em','$nic','$city')";

	$res1 = mysqli_query($conn,$sql1);

	$sql2 = "INSERT INTO user (userName,password) VALUES ('$uname','$pw')";

	$res2 = mysqli_query($conn,$sql2);

	echo "Inserted!";
	}

} else {
	echo "Error!
	";
}





?>