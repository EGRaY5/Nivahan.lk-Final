<?php
session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}
?>

    <!doctype html>
    <html lang = "en">

<head>
    <title>2nd year group project</title>
    <meta charset = "utf-8">
    <metaname ="viewport" content="width=device-width, initial-scale=1">

    <!--this is for link css file-->
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!--//this is for link icons for site-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!--//this is for link bootstrap to site-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <?php
    if (isset($_SESSION['log_count'])){
        if($log_count == 1){
            echo"
			<script type='text/javascript'>
    		$(window).on('load',function(){
        		$('#myModal').modal('show');
		    });
			</script>";
        }
    }
    ?>
</head>

<?php
require('header.php');
?>


<br/>
<br/>

<div class="row">
<div class="col-md-3">
    <center></p><h2>Our Supervisor</h2></center>
    <br/>
    <center><img src="Images/Sir.jpg" style="width:300px; height:300px;" " ></center>
    <br/>
    <center></p><h4>Mr.Niyomal Boteju</h4></center>
</div>
<div class="col-md-5" style="text-align:justify;">
    <center></p><h2>Meet Our Team</h2></center>
    <br/>
    <center><img src="Images/Group.jpg" style="width:500px;" " ></center>
    <br/>
    <br/>
    <p style="font-size: 18px;"> Nivahan.lk is an architectural guide for you and for anybody who is willing to build a new house or a building or any construction.Through Nivahan.lk you can get a vast knowledge of information about architecture by accessing our wiki.If you are interested in constructing a new house or building then you can select an architect based on your area and communicate  with an architect to get the best architect to build your dream house or building. Nivahan.lk paves the way for Researchers also to see past projects of  other researches and of Research Centers in the World.</p>
    <p style="font-size: 18px;">We are 2nd year undergraduate students of University of Colombo School of Computing. We designed Nivahan.lk an Architectural guide for our 2nd year group project. We got great support from our Supervisor Mr. Niyomal Boteju and our Mentor Miss.Chathurangi Weerasinghe.</p>
    <br/>
    <h3>Our Team</h3>
    <h4>1.Vinodya Bandara</h4>
    <h4>2.Supun Rajasinghe</h4>
    <h4>3.Eranda Grero</h4>
    <h4>4.Warren Pietersz</h4>
    <h4>5.Pasindu Gunerathna</h4>
    <h4>6.Sandun De Silva</h4>
    </i>

</div>
<div class="col-md-4">
    <center></p><h2>Our Mentor</h2></center>
    <br/>
    <center><img src="Images/Miss.jpg" style="width:350px; height:300px; "  ></center>
    <br/>
    <center></p><h4>Miss.Chathurangi Weerasinghe</h4></center>
</div>
</div>
<br/>
<?php require('footer.php')?>


