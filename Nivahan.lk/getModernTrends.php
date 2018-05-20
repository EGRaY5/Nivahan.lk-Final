<?php
require('dbcon.php');
if(isset($_POST["detail_id"]))
{

    $query = "SELECT * FROM modern_trends WHERE id = '".$_POST["detail_id"]."'";
    $result = mysqli_query($conn, $query);


    while($row = mysqli_fetch_array($result)){
        echo "<img style='width:100%;height:450px' src='".$row['image']. "'/>";
        echo  "<h3><p style='width:100%; align:justify'>". $row['Trend']."</p></h3>";
        echo  "<p style='width:100%; align:justify'>". $row['Description']."</p>";
        echo  "<p style='width:100%; align:justify'>". $row['More']."</p>";
    }

}
?>