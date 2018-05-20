<?php
require('dbcon.php');
if(isset($_POST["query"]))
{
    $output='';
//    Selecting distinct district from architect table for the input district
    $query ="SELECT DISTINCT District FROM architect WHERE District LIKE '%".$_POST["query"]."%'";
//    Result of query allocated to variable result
    $result = mysqli_query($conn,$query);
//   Output displayed if an input is givn according to the above query
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .='<li>'.$row["District"].'</li>';
        }
    }
    else
    {
        $output .='<li>District not Found</li>';
    }
    $output .='</ul>';
    echo $output;

}
?>