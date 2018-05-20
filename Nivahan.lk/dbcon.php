<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'ags';

$conn = mysqli_connect($server,$username,$password,$db);

if (!$conn) {
    echo 'fail';
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>