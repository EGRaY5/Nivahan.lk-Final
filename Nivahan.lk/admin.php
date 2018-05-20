<?php
require('dbcon.php');
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

<?php require('header.php');?>

<br/>
<br/>
<div class="row">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">ARCHITECTS</a></li>
            <li><a data-toggle="tab" href="#menu1">RESEARCHERS</a></li>
            <li><a data-toggle="tab" href="#menu2">NORMAL USERS</a></li>
            <li><a data-toggle="tab" href="#menu3">QUESTIONS IN FORUM</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <?php
                    $sqlarchitect = "SELECT * FROM architect";
                    $result = mysqli_query($conn,$sqlarchitect);

                ?>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Membership ID</th>
                        <th>Practice Name</th>
                        <th>District</th>
                        <th>Contact number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td><img style="width:30px;height:30px" src="<?php echo $row['Image']?>"></td>
                        <td><?php echo $row['firstName']?></td>
                        <td><?php echo $row['lastName']?></td>
                        <td><?php echo $row['userName']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['m_id']?></td>
                        <td><?php echo $row['Practice_Name']?></td>
                        <td><?php echo $row['District']?></td>
                        <td><?php echo $row['Contact_no']?></td>
                        <form action="deleteUser.php" method="post">
                            <td><button type="submit" name="deleteArchitect" value="<?php echo $row['userName']?>" class="form-group"><i style="color: red" class="fa fa-trash" aria-hidden="true"></i></button></td>
                        </form>
                    </tr>
                    </tbody>
                    <?php }?>
                </table>

            </div>
            <div id="menu1" class="tab-pane fade">
                <?php
                $sqlResearchers = "SELECT * FROM researcher";
                $result = mysqli_query($conn,$sqlResearchers);

                ?>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Research Area</th>
                        <th>Researched University</th>
                        <th>University</th>
                        <th>qualification</th>
                        <th>Contact number</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td><img style="width:30px;height:30px" src="<?php echo $row['Image']?>"></td>
                        <td><?php echo $row['firstName']?></td>
                        <td><?php echo $row['lastName']?></td>
                        <td><?php echo $row['userName']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['researchArea']?></td>
                        <td><?php echo $row['uni_research']?></td>
                        <td><?php echo $row['university']?></td>
                        <td><?php echo $row['qualification']?></td>
                        <td><?php echo $row['contact']?></td>
                        <form action="deleteUser.php" method="post">
                            <td><button type="submit" name="deleteResearcher" value="<?php echo $row['userName']?>" class="form-group"><i style="color: red" class="fa fa-trash" aria-hidden="true"></i></button></td>
                        </form>
                    </tr>
                    </tbody>
                    <?php }?>
                </table>

            </div>
            <div id="menu2" class="tab-pane fade">
                <?php
                $sqlResearchers = "SELECT * FROM normaluser";
                $result = mysqli_query($conn,$sqlResearchers);

                ?>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>NIC</th>
                        <th>district</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td><img style="width:30px;height:30px" src="<?php echo $row['Image']?>"></td>
                        <td><?php echo $row['firstName']?></td>
                        <td><?php echo $row['lastName']?></td>
                        <td><?php echo $row['userName']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['nic']?></td>
                        <td><?php echo $row['district']?></td>
                        <form action="deleteUser.php" method="post">
                            <td><button type="submit" name="deleteCustomer" value="<?php echo $row['userName']?>" class="form-group"><i style="color: red" class="fa fa-trash" aria-hidden="true"></i></button></td>
                        </form>
                    </tr>
                    </tbody>
                    <?php }?>
                </table>
            </div>
            <div id="menu3" class="tab-pane fade">
                <?php
                $sqlResearchers = "SELECT * FROM question";
                $result = mysqli_query($conn,$sqlResearchers);

                ?>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>question</th>
                        <th>user name</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td><?php echo $row['question']?></td>
                        <td><?php echo $row['userName']?></td>
                        <td><a href="#"><i style="color: red" class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    </tbody>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require('footer.php');?>