<?php
require('dbcon.php');

session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}

if(isset($_POST['query'])){
    $sql = "SELECT * FROM normaluser WHERE firstName LIKE '%".$_POST["query"]."%'";
    $result = mysqli_query($conn,$sql);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $userName = $row['userName'];
            $output .="<li><img style='width:50px;height:50px' src='".$row['Image']."'>".$row['firstName']." ".$row['lastName']."</li>";
        }
    }
    else
    {
        $output .='<li>City not Found</li>';
    }
    $output .='</ul>';
    if(isset($userName)){
        setcookie("UserNameOfFriend",$userName);
    }

    echo $output;

}
?>