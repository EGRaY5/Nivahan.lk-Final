<?php
include("dbcon.php");
session_start();




    $result = mysqli_query($conn,"SELECT * FROM modern_trends;");

    $result1 = mysqli_query($conn,"SELECT * FROM history;");

    $result2 = mysqli_query($conn,"SELECT * FROM design;");

    $result3 = mysqli_query($conn,"SELECT * FROM roof;");

    $result4 = mysqli_query($conn,"SELECT * FROM research_centers;");




?>
<!doctype html>
<html lang = "en">

<head>
	<title>2nd year group project</title>
	<meta charset = "utf-8">
	<metaname="viewport" content="width=device-width, initial-scale=1">

	<!--this is for link css file-->
    <link rel="stylesheet" type="text/css" href="css/wiki.css">
	
	<!--//this is for link icons for site-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<!--//this is for link bootstrap to site-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<?php require('header.php');?>

        <!--start content-->
		<div class="row" id="content">
            <!--start container-->
            <div class="container">
<!--                modal for history-->
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

                <!--create tabs-->
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">History</a></li>
                    <li><a data-toggle="tab" href="#menu1">Design</a></li>
                    <li><a data-toggle="tab" href="#menu2">Modern Trends</a></li>
                    <?php if(isset($_SESSION['uname']) && $_SESSION['utype']==3){?>
                        <li><a data-toggle="tab" href="#menu3">Research Centers</a></li>
                    <?php }?>
                </ul>
                <!--end create tab-->
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">

                        <div class="row">
                            <?php
                            while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC))
                            {
                            ?>
                            <div class="col-md-4">
                                <div class="card">

                                    <img width="100%" height="300px"  src="<?php echo $row['image'];?> "/>
<!--                                    <div class="container">-->
                                        <h4><b><?php echo $row['name'];?> </b></h4>
                                        <p style="width:300px; align:justify"><?php echo $row['location'];?></p>
                                        <p style="width:300px; align:justify"><?php echo $row['completed'];?></p>
                                        <p style="width:300px; align:justify"><?php echo $row['dimension'];?></p>


                                        <input type="button" value="more" id="<?php echo $row['id'];?>" class="view_history" data-toggle="modal" data-target="#myModal">

<!--                                    </div>-->

                                </div>
                            </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>

                    <div id="menu1" class="tab-pane fade">
                        <center><h2 style="color:SlateBlue;">House Designs</h2></center>

                        <div class="row">
                            <?php
                            while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC))
                            {
                            ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img width="100%" height="300px"  src="<?php echo $row['image'];?> "/>
<!--                                    <div class="container">-->
                                        <h4><b><?php echo $row['design'];?> </b></h4>
                                        <p style="width:300px; align:justify"><?php echo $row['description'];?></p>

                                        <input type="button" name="more" value="more" id="<?php echo $row['id'];?>" class="view_design" data-toggle="modal" data-target="#myModal">

<!--                                    </div>-->
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>

                        <center><h2 style="color:SlateBlue;">Roof Designs</h2></center>

                        <div class="row">
                            <?php
                            while($row = mysqli_fetch_array($result3,MYSQLI_ASSOC))
                            {
                            ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img width="100%" height="300px"  src="<?php echo $row['image'];?> "/>
<!--                                    <div class="container">-->
                                        <h4><b><?php echo $row['design'];?> </b></h4>
                                        <p style="width:300px; align:justify"><?php echo $row['description'];?></p>
                                        <input type="button" name="more" value="more" id="<?php echo $row['id'];?>" class="view_roof" data-toggle="modal" data-target="#myModal">
<!--                                    </div>-->
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <div id="menu2" class="tab-pane fade">

                        <div class="row">
                            <?php
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
//                                Get modern trends information from the database
                            {
                                ?>
                            <div class="col-md-4">
                                <div class="card">
<!--                            Displaying research center information fetched from database-->
                                    <img width="100%" height="300px"  src="<?php echo $row['image'];?> "/>
<!--                                    <div class="container">-->
                                        <h4><b><?php echo $row['Trend'];?> </b></h4>
                                        <p style="width:300px; align:justify"><?php echo $row['Description'];?></p>
                                    <input type="button" name="more" value="more" id="<?php echo $row['id'];?>" class="view_modernTrends" data-toggle="modal" data-target="#myModal">

<!--                                    </div>-->
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

<!--                    --><?php
//
//                    if($_SESSION['utype']=='3'){
//                    }
//                    ?>

                    <div id="menu3" class="tab-pane fade">

                        <div class="row">
                            <?php
//                            Get research center information from the database
                            while($row = mysqli_fetch_array($result4,MYSQLI_ASSOC))
                            {
                                ?>
                                <div class="col-md-4">
                                    <div class="card">
<!--                                        Displaying research center information fetched from database-->
                                        <img width="100%" height="300px"  src="<?php echo $row['image'];?> "/>
                                        <h4><b><?php echo $row['name'];?> </b></h4>
                                        <p style="width:300px; align:justify"><?php echo $row['basic'];?></p>
                                        <input type="button" name="more" value="more" id="<?php echo $row['id'];?>" class="view_researchcenters" data-toggle="modal" data-target="#myModal">

                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
		</div>

<?php require ('footer.php');?>

	</div>
<!--this is for history modal-->
    <script>
        $(document).ready(function(){
            $('.view_history').click(function(){
                var detail_id = $(this).attr("id");
                $.ajax({
                    url:"getHistory.php",
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

    <script>
        $(document).ready(function(){
            $('.view_design').click(function(){
                var detail_id = $(this).attr("id");
                $.ajax({
                    url:"getDesign.php",
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

    <script>
        $(document).ready(function(){
            $('.view_roof').click(function(){
                var detail_id = $(this).attr("id");
                $.ajax({
                    url:"getRoof.php",
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
    <script>
        $(document).ready(function(){
//            When more button clicked of modern trends class view_modern trends
            $('.view_modernTrends').click(function(){
//                Id of that attribute is loaded to the variable detail id
                var detail_id = $(this).attr("id");
//                Ajax used to refresh the page in the same page
                $.ajax({
//                    Goes to the URL and using the Post method detail id is posted to the URL page
                    url:"getModernTrends.php",
                    method:"post",
                    data:{detail_id:detail_id},
                    success:function(data){
//                        If above post is success the above  data is allocated to the modal using modal id detail and then shown in the modal
                        $('#detail').html(data);
                        $('#dataModal').modal("show");
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.view_researchcenters').click(function(){
                var detail_id = $(this).attr("id");
                $.ajax({
                    url:"getResearchCenters.php",
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
</body>

</html>