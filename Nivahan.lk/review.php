<?php
require('dbcon.php');

if(isset($_POST['reviewSubmit'])){
    echo $username = $_POST['reviewSubmit'];
    echo $rating = $_POST['rating'];

    $sql="INSERT INTO review (rating,userName) VALUES ('$rating','$username')";
    mysqli_query($conn,$sql);
    header("location: FindAProffesinal.php");
}

?>