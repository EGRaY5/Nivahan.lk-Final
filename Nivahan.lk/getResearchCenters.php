<?php
require('dbcon.php');
if(isset($_POST["detail_id"]))
{

    $query = "SELECT * FROM research_centers WHERE id = '".$_POST["detail_id"]."'";
    $result = mysqli_query($conn, $query);


    while($row = mysqli_fetch_array($result)){
        echo "<img style='width:100%;height:450px' src='".$row['image']. "'/>";
        echo  "<h3><b>".$row['name']."</b></h3>";
        echo  "<p style='width:100%; align:justify'>". $row['basic']."</p>";
        echo  "<p style='width:100%; align:justify'>". $row['desc1']."</p>";
        echo  "<img style='width:100%;height:350px' src='".$row['image1']. "'/>";
        echo  "<img style='width:100%;height:350px' src='".$row['image2']. "'/>";
        echo  "<p style='width:100%; align:justify'>". $row['desc2']."</p>";
        echo  "<img style='width:100%;height:350px' src='".$row['image3']. "'/>";
        echo  "<img style='width:100%;height:350px' src='".$row['image4']. "'/>";
    }

}
?>