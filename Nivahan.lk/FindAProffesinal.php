<?php

require('dbcon.php');
session_start();


$result = mysqli_query($conn,"SELECT * FROM architect");

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


</head>

<?php
require('header.php');
?>

    <div class="row" ">
<!--Using a form the interface section for search is created-->
        <form action="FindAProffesinal.php" method="post" >
            <br/>
            <input type="text" name="country" id="country" class="form-control" placeholder="Enter district name" style="width:500px; margin:auto">
            <center><button type="submit" name="search" class="btn btn-default" id="SearchBarButton" >SEARCH</button></center>
            <br/><br/>
        </form>

    </div>
    <center>
    <div id="countryList"></div>
    </center>
    <script>
        $(document).ready(function(){
//            If any text is input to the input field with id country
            $('#country').keyup(function(){
//                The value of above input field is assigned to variable query
                var query = $(this).val();
                if(query!='')
                {
                    $.ajax({
//                        Go to the below URL and using post method post the data in the query variable to the given URL file
                        url:"search.php",
                        method:"POST",
                        data:{query:query},
//                        If successful that data will shown to select in the search area
                        success:function(data)
                        {
                            $('#countryList').fadeIn();
//                            Displays the district related from search.php
                            $('#countryList').html(data);
                        }
                    });
                }
            });
//          When a district is selected the district name is displayed in input field and then the selection drop down will away
            $(function(){
                $('#countryList').on('click','li',function(){
                    $('#country').val($(this).text());
                    $('#countryList').fadeOut();
                });
            });
        });
    </script>

    <div class="row" id="content">

        <div class="row">

            <div class="col-md-9">

                    <?php
//                    If search button is clicked and input field not empty
                    if(isset($_POST['search']) && !empty($_POST['search'])){
//                        Allocate to result 1 variable all architects of the district value in the input field
                        $result1 = mysqli_query($conn,"SELECT * FROM architect WHERE District='".$_POST['country']."'");

                        while($row = mysqli_fetch_array($result1))
//                            Display the filtered architects in the given district
                        {
                            ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <img style="width:300px;height:300px" src="<?php echo $row['Image']; ?>" alt="John" style="width:100%">
                                    <h4><?php echo $row['firstName']." ".$row['lastName']; ?></h4>
                                    <p><?php echo $row['Practice_Name']; ?></p>
                                    <div style="margin: 24px 0;">
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </div>
                                    <p>
<!--                                    Button Directs to the architect profile of the selected architect-->
                                    <form action="ArchiProfile(customer view).php" method="post">
                                        <button type="submit" name="contact" value="<?php echo $row['m_id']; ?>">Contact</button>
                                    </form>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }}


                    else{
//                        Display All architects if no value given in input field to search

                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                        <div class="col-md-6">
                            <div class="card">
                                <img style="width:300px;height:300px" src="<?php echo $row['Image']; ?>" alt="John" style="width:100%">
                                <h4><?php echo $row['firstName']." ".$row['lastName']; ?></h4>
                                <p><?php echo $row['Practice_Name']; ?></p>
                                <div style="margin: 24px 0;">
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </div>
                                <p>
                                    <form action="ArchiProfile(customer view).php" method="post">
                                        <button type="submit" name="contact" value="<?php echo $row['m_id']; ?>">Contact</button>
                                    </form>
                                </p>
                            </div>
                        </div>
                        <?php
                    }}
                    ?>


            </div>

            <div class="col-md-3">
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