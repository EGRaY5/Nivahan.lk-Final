<?php 
require ('dbcon.php');
if (isset($_POST['uname']) and isset($_POST['pw'])){

	$uname = $_POST['uname'];
	$pw = $_POST['pw'];
	$hpw = md5($pw);

	$query = "SELECT * FROM user WHERE userName = '$uname' and password='$hpw'";
	$res1 = mysqli_query($conn,$query);

	$count = mysqli_num_rows($res1);

	$res = mysqli_fetch_array($res1);
	$utype = $res['userType'];
	// var_dump($res);die();

	if ($count==1){
		session_start();
		$_SESSION['uname'] = $uname;
		$_SESSION['utype'] = $utype;

		$log_count = $res['log_count'];
		$log_count+=1;
		$sql = "UPDATE user SET log_count='$log_count' WHERE userName ='$uname'";
		$res1 = mysqli_query($sql1);

		$_SESSION['log_count'] = $log_count;

		if($utype == 0){
            header("location: admin.php");
        }else{
            header("location: index.php");
        }

	}else{
        $message = "Your user name or password wrong";
        echo "<script type='text/javascript'>alert('$message');
                                             location=\"login.php\";
                </script>";

	}

}
?>