<?php
session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}

    require('dbcon.php');



    if(isset($_POST['contact'])){
        $profileDetails= mysqli_query($conn,"SELECT * FROM architect WHERE m_id = '".$_POST['contact']."'");
    }
    while($row = mysqli_fetch_array($profileDetails)){
        $name =  $row['firstName']." ".$row['lastName'];
        $image = $row['Image'];
        $contact = $row['Contact_no'];
        $email = $row['email'];
        $id = $row['m_id'];
        $practiceName = $row['Practice_Name'];
        $district = $row['District'];
        $userName = $row['userName'];
    }

    setcookie('msgReciever',$userName);
    $result = mysqli_query($conn,"SELECT * FROM projects WHERE m_id='$id';");

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

    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">



	<!--//this is for link bootstrap to site-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<?php require('header.php'); ?>

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
							<img class="img-circle center-block" src="<?php echo $image; ?>">
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
						<h2><?php echo $name; ?></h2>
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
                            <h1>EMAIL</h1><br/>
                            <h3><?php echo $email;?></h3><br/><br/>

                            <h1>MEMBERSHIP ID</h1><br/>
                            <h3><?php echo $id;?></h3><br/><br/>

                            <h1>PRACTICE NAME</h1><br/>
                            <h3><?php echo $practiceName;?></h3><br/><br/>

                            <h1>DISTRICT</h1><br/>
                            <h3><?php echo $district;?></h3><br/><br/>

					    </div>
					    <div id="menu1" class="tab-pane fade">
                            <?php
//                            Get architect_projects from database
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>

                                <div class="col-md-6" style="height:500px">
<!--                                    Display architect_projects taken from database-->
                                    <img width="300px" height="300px"  style="margin-right: 20px;" src="<?php echo $row['Image1'];?> "/><br/><p style="width:300px; align:justify"><?php echo $row['Desc1'];?></p>
                                    <a target="_blank" href="3Dniwahan/parsingOBJ.html">View 3D Model</a>
                                </div>
                                <?php
                                }
                                ?>

					      
					    </div>
					    <div id="menu2" class="tab-pane fade">
                            <div class="review">
                                <h3 >Write a Review for Architect</h3>
                                <div class="col-xs-3">
                                    <div class="pro-profile-photo">
                                        <img class="img-circle" style="width:150px;height:150px" src="<?php echo $image;?>" />

                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <br>
                                    <br>
                                    <label class='control-label text-s text-dt-m text-bold' id="margin12"><span>Rate This Professional</span></label>
                                    <br>
                                    <br>
                                    <form action="review.php" method="post">
                                        <span class="starRating" id="margin_length">
                                            <input id="rating5" type="radio" name="rating" value="5">
                                            <label for="rating5">5</label>
                                            <input id="rating4" type="radio" name="rating" value="4">
                                            <label for="rating4">4</label>
                                            <input id="rating3" type="radio" name="rating" value="3" checked>
                                            <label for="rating3">3</label>
                                            <input id="rating2" type="radio" name="rating" value="2">
                                            <label for="rating2">2</label>
                                            <input id="rating1" type="radio" name="rating" value="1">
                                            <label for="rating1">1</label>
                                        </span>
                                        <br/><br/>
                                        

                                        <div class='relationship' >
                                        <div class="form-group" >
                                            <label class='control-label text-s text-dt-m text-bold'><span>Your relationship to the professional</span></label>
                                            <select class="dropdown">
                                                <option value='1'>I hired this Architect</option>
                                                <option value='2'>I am a professional who worked with this Architect</option>
                                                <option value='3'>I received an estimate/consultation but did not hire this Architect</option>
                                                <option value='4'>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br/><br/>
                                    <button type="submit" class="btn btn-primary" name="reviewSubmit" value="<?php echo $userName?>">submit</button>

                                    </form>

                                    



                                </div>
                            </div>


					      
					    </div>
					  </div>
					</div>
							
				</div>
			

				<div class="col-md-3">
                    <!--create modal for view suggestions-->
                    <div id="dataModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <center><h3>SUGGEST FRIEND</h3></center>
                                </div>
                                <div class="modal-body" id="detail">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form action="chat.php" method="post">
					    <button type="submit" name="msg" value="<?php echo $userName;?>" class="btn btn-default"><i class="fa fa-envelope" aria-hidden="true"></i>  Message</button>
                    </form>

                    <input type="button" name="suggestFriend" value="SUGGEST FRIEND" id="<?php echo $name;?>" class="suggest_friend" data-toggle="modal" data-target="#myModal">

                    <!--send Architect name using ajax-->
                    <script>
                        $(document).ready(function(){
                            $('.suggest_friend').click(function(){
                                var detail_id = $(this).attr("id");
                                $.ajax({
                                    url:"suggestFriend.php",
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


                    <h3><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $contact; ?></h3>

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

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCN02p7ickvajWBJ86FzA3yXZwtDwM61A8&callback=myMap"></script>
				</div>	
			</div>
		</div>


<?php require('footer.php')?>