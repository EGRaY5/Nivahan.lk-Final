<?php
require('dbcon.php');

if(isset($_POST['deleteArchitect'])){
    $user = $_POST['deleteArchitect'];
    $sql = "DELETE FROM architect WHERE userName = '$user'";
    mysqli_query($conn,$sql);

    $sql1 = "DELETE FROM user WHERE userName = '$user'";
    mysqli_query($conn,$sql1);

    header("location: admin.php");
}

if(isset($_POST['deleteResearcher'])){
    $user = $_POST['deleteResearcher'];
    $sql = "DELETE FROM researcher WHERE userName = '$user'";
    mysqli_query($conn,$sql);

    $sql1 = "DELETE FROM user WHERE userName = '$user'";
    mysqli_query($conn,$sql1);

    header("location: admin.php");
}

if(isset($_POST['deleteCustomer'])){
    $user = $_POST['deleteCustomer'];
    $sql = "DELETE FROM normaluser WHERE userName = '$user'";
    mysqli_query($conn,$sql);

    $sql1 = "DELETE FROM user WHERE userName = '$user'";
    mysqli_query($conn,$sql1);

    header("location: admin.php");
}

?>