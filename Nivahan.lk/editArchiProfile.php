<?php
session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}

require('dbcon.php');

if(isset($_POST['updateData'])){
    $sql = "UPDATE architect SET email='".$_POST['email']."' ,District= '".$_POST['district']."', Contact_no='".$_POST['contact']."' WHERE userName='".$_SESSION['uname']."'";
    $res1 = mysqli_query($conn,$sql);
    header("location: ArchiProfile(archi view).php");
}

if(isset($_POST["detail_id"])){
    $query = "SELECT * FROM architect WHERE userName = '".$_POST["detail_id"]."'";

    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($result)){
    ?>
        <form action="editArchiProfile.php" method="post">
            <input name="email" type="text" value="<?php echo $row['email']?>"><br/><br/>
            <input name="district" type="text" value="<?php echo $row['District']?>"><br/><br/>
            <input name="contact" type="text" value="<?php echo $row['Contact_no']?>"><br/><br/>
            <input type="submit" name="updateData" value="SUBMIT">
        </form>
<?php
    }

}



?>