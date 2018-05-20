<?php
require('dbcon.php');
session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}
$user = $_SESSION['uname'];
$sql = "SELECT * FROM normaluser WHERE userName = '".$user."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    $name = $row['firstName']." ".$row['lastName'];
    $email = $row['email'];
    $nic = $row['nic'];
    $district = $row['district'];
    $image = $row['Image'];
}

?>
    <!doctype html>
    <html lang = "en">

<head>
    <title>2nd year group project</title>
    <meta charset = "utf-8">
    <metaname="viewport" content="width=device-width, initial-scale=1">

    <!--this is for link css file-->
    <link rel="stylesheet" type="text/css" href="css/ArchiProfile(customer view).css">

    <!--//this is for link icons for site-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!--//this is for link bootstrap to site-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<?php require('header.php')?>

<div class="row" id="content">
    <div class="row">
        <div class="container-fluid">
            <div class="coverImage">
                <img src="Images/cover.png">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="profile">
                    <img class="img-circle center-block" src="<?php echo $image?>">
                </div>

            </div>


            <div class="row">
                <center>
                    <br>
                    <br>
                    <a><i id="userSocial" class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
                    <a><i id="userSocial" class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
                    <a><i id="userSocial" class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                    <a><i id="userSocial" class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                    <a><i id="userSocial" class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                </center>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row" id="userName">
                <h3><?php echo $name;?></h3>
                <br>
                <br>
                <br>

            </div>

            <div class="container-fluid">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Overview</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">

<!--                         <button type="button" class="btn btn-default"><i class="fa fa-envelope" aria-hidden="true"></i>  Edit Your Profile</button>
 -->
                        <h1>EMAIL</h1><br/>
                        <h3><?php echo $email;?></h3><br/><br/>

                        <h1>NIC Number</h1><br/>
                        <h3><?php echo $nic;?></h3><br/><br/>

                        <h1>DISTRICT</h1><br/>
                        <h3><?php echo $district;?></h3><br/><br/>


                    </div>
                    <div id="menu1" class="tab-pane fade">

                    </div>
                    <div id="menu2" class="tab-pane fade">

                    </div>
                </div>
            </div>

        </div>


        <div class="col-md-3">

            <br>



            <br>

            <div id="map" style="width:auto;height:400px;background:yellow"></div>

            <script>
                function myMap() {
                    var mapCanvas = document.getElementById("map");
                    var mapOptions = {
                        center: new google.maps.LatLng(6.9271, 79.8612), zoom: 10
                    };
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB87iA2NJnNH2DvDaQkFuIq0DaZ1Ghie1I&callback=myMap"></script>
        </div>
    </div>
</div>


<?php require('footer.php')?>