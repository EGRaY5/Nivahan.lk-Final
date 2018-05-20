<?php

require('dbcon.php');
session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}

$result = mysqli_query($conn,"SELECT * FROM researcher");

?>
<!doctype html>
<html lang = "en">

<head>
    <title>2nd year group project</title>
    <meta charset = "utf-8">
    <metaname="viewport" content="width=device-width, initial-scale=1">

    <!--this is for link css file-->
    <link rel="stylesheet" type="text/css" href="css/FindAProffesionalSearch.css">

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

<div class="row" ">

<!--<form action="FindAProffesinal.php" method="post" >-->
<!--    <br/>-->
<!--    <input type="text" name="country" id="country" class="form-control" placeholder="Enter district name" style="width:500px; margin:auto">-->
<!--    <center><button type="submit" name="search" class="btn btn-default" id="SearchBarButton" >SEARCH</button></center>-->
<!--    <br/><br/>-->
<!--</form>-->
<!---->
<!--</div>-->
<!--<center>-->
<!--    <div id="countryList"></div>-->
<!--</center>-->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $('#country').keyup(function(){-->
<!--            var query = $(this).val();-->
<!--            if(query!='')-->
<!--            {-->
<!--                $.ajax({-->
<!--                    url:"search.php",-->
<!--                    method:"POST",-->
<!--                    data:{query:query},-->
<!--                    success:function(data)-->
<!--                    {-->
<!--                        $('#countryList').fadeIn();-->
<!--                        $('#countryList').html(data);-->
<!--                    }-->
<!--                });-->
<!--            }-->
<!--        });-->
<!---->
<!--        $(function(){-->
<!--            $('#countryList').on('click','li',function(){-->
<!--                $('#country').val($(this).text());-->
<!--                $('#countryList').fadeOut();-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->

<div class="row" id="content">

    <div class="row">

        <div class="col-md-9">

            <?php

                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <div class="col-md-6">
                        <div class="card">
                            <img style="width:300px;height:300px" src="<?php echo $row['Image']; ?>" alt="John" style="width:100%">
                            <h4><?php echo $row['firstName']." ".$row['lastName']; ?></h4>
                            <p><?php echo $row['researchArea']; ?></p>
                            <div style="margin: 24px 0;">
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </div>
                            <p>
                           <form action="researcherProfil(customer view).php" method="post">
                               <button type="submit" name="contact" value="<?php echo $row['userName']; ?>">Contact</
                            </form>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            ?>


        </div>

        <div class="col-md-3">
            <div id="map" style="width:auto;height:400px;background:yellow"></div>

            <script>
                function myMap() {
                    var mapCanvas = document.getElementById("map");
                    var mapOptions = {
                        center: new google.maps.LatLng(51.5, -0.2), zoom: 10
                    };
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCN02p7ickvajWBJ86FzA3yXZwtDwM61A8&callback=myMap"></script>
        </div>

    </div>

</div>

<div class="row" id="Footer">
    <div class = "col-md-3 col-xs-6">
        <h2>Latest Designs</h2>
        <ul>
            <li>Hypnotic Bridges</li>
            <li>Rotating Skyscrapers</li>
            <li>Indoor Parks</li>
            <li>Invisible Architecture</li>
        </ul>

    </div>

    <div class = "col-md-3 col-xs-6">
        <h2>Profiles</h2>
        <ul>
            <li>Architect</li>
            <li>Customer</li>
            <li>Researcher</li>
        </ul>

    </div>

    <div class = "col-md-3 col-xs-6">
        <h2>House Categories</h2>
        <ul>
            <li>Beach Houses</li>
            <li>Bunglow Houses</li>
            <li>Cottage Houses</li>
            <li>Contemporary Houses</li>

        </ul>

    </div>

    <div class = "col-md-3 col-xs-6">
        <h2>Contact Us</h2>
        <ul>
            <li>Mobile</li>
            <li>Email</li>
            <li>Office</li>
        </ul>

    </div>
</div>

</div>
</body>

</html>