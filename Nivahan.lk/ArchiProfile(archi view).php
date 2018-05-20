<?php
require('dbcon.php');
session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}
$user = $_SESSION['uname'];
$sql = "SELECT * FROM architect WHERE userName = '".$user."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    $name = $row['firstName']." ".$row['lastName'];
    $mid = $row['m_id'];
    $email = $row['email'];
    $image = $row['Image'];
    $district = $row['District'];
    $contact = $row['Contact_no'];
    $practiceName = $row['Practice_Name'];
}

$sql1 = "SELECT * FROM projects WHERE m_id='$mid'";
$result1 = mysqli_query($conn,$sql1);



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
							<img class="img-circle center-block" src="<?php echo $image;?>">
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

                    <div id="dataModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body" id="detail">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


					<div class="row" id="userName">
						<h3><?php echo $name;?></h3>
						<br>
						<br>
						<br>

					</div>

					<div class="container-fluid">
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">Overview</a></li>
					    <li><a data-toggle="tab" href="#menu1">Projects</a></li>
					    <li><a data-toggle="tab" href="#menu2">Reviews</a></li>
					  </ul>

					  <div class="tab-content">
					    <div id="home" class="tab-pane fade in active">

                            <input type="button" value="EDIT YOUR PROFILE" id="<?php echo $user?>" class="edit_profile" data-toggle="modal" data-target="#myModal">

                            <h1>EMAIL</h1><br/>
                            <h3><?php echo $email;?></h3><br/><br/>

                            <h1>MEMBERSHIP ID</h1><br/>
                            <h3><?php echo $mid;?></h3><br/><br/>

                            <h1>PRACTICE NAME</h1><br/>
                            <h3><?php echo $practiceName;?></h3><br/><br/>

                            <h1>DISTRICT</h1><br/>
                            <h3><?php echo $district;?></h3><br/><br/>

                            <h1>CONTACT NO</h1><br/>
                            <h3><?php echo $contact;?></h3><br/><br/>

					    </div>
					    <div id="menu1" class="tab-pane fade">

                            <?php
//                            Get architect_projects from database
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                ?>
                                <div class="col-md-6" style="height:500px">
<!--                                    Display architect_projects taken from database-->
                                    <img width="300px" height="300px"  style="margin-right: 20px;" src="<?php echo $row1['Image1'];?> "/><br/><p style="width:300px; align:justify"><?php echo $row1['Desc1'];?></p>
                                    <a target="_blank" href="3Dniwahan/parsingOBJ.html">View 3D Model</a>
                                </div>

                                <?php
                            }
                            ?>
					    </div>
					    <div id="menu2" class="tab-pane fade">
                            <?php
                                $sql2="SELECT * FROM review WHERE userName='$user'";
                                $result=mysqli_query($conn,$sql2);
                                while($row = mysqli_fetch_assoc($result)){
                                    $rate = $row['rating'];
                                }
                                echo $ratingPercentage = (($rate/5)*100)."%";
                            ?>

                            <div class="box" style="width:100%;height:50px;background-color: #ddd">
                                <?php
                                  echo "<div class='rating' style='width:$ratingPercentage;height:50px;background-color:green'>";
                                ?>
                            </div>

					    </div>
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
					    center: new google.maps.LatLng(7.0713, 80.0088), zoom: 10
					  };
					  var map = new google.maps.Map(mapCanvas, mapOptions);
					}
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB87iA2NJnNH2DvDaQkFuIq0DaZ1Ghie1I&callback=myMap"></script>

				</div>	
			</div>
		</div>

<script>
    $(document).ready(function(){
        $('.edit_profile').click(function(){
            var detail_id = $(this).attr("id");
            $.ajax({
                url:"editArchiProfile.php",
                method:"post",
                data:{detail_id:detail_id},
                success:function(data){
                    $('#detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    });
</script>


<?php require('footer.php')?>

</html>
