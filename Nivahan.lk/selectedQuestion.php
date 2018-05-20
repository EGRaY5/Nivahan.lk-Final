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

</head>
<?php
    require('header.php');
?>


		<div class="row">
			<center>
				<div class="row">
					<form class="navbar-form " method="post" action="selectedQuestion.php">
					
				      <div class="form-group">
				        

				        <div style="width:500px;">
					        <input type="text" name="question1" id="question1" class="form-control" placeholder="Search Question">
					    
					    	<button type="submit" class="btn btn-default" > SEARCH </button>
						</div>
				      </div>
					    <div id="questionList"></div>
					    <script>
					        $(document).ready(function(){
					            $('#question1').keyup(function(){
					                var query = $(this).val();
					                if(query!='')
					                {
					                    $.ajax({
					                        url:"searchQuestion.php",
					                        method:"POST",
					                        data:{query:query},
					                        success:function(data)
					                        {
					                            $('#questionList').fadeIn();
					                            $('#questionList').html(data);
					                        }
					                    });
					                }
					            });

					            $(function(){
					                $('#questionList').on('click','li',function(){
					                    $('#question1').val($(this).text());
					                    $('#questionList').fadeOut();
					                });
					            });
					        });
					    </script>
					     <?php 
					    // if(isset($_POST['question1'])){
					    // 	$_POST['question']="wd";
					    // }else{
					    // 	$_POST['question']="";
					    // }
					    ?>
				      </form>
				      <form class="navbar-form " action="AskQuestion.php">
				      
				      <div class="col-sm-3 col-md-6 col-lg-4" ;">
							
						<button type="submit"  class="btn btn-default" > Ask Question </button>
				
					</div>
				      
				    </form>

				</div>
			</center>
		</div>
			<?php echo "</br>";

			
			
			// require ('searchQuestion.php');
			// echo $result;

			// for ($k=0; $k < 1; $k++) { 
			// 	$_POST['question']='';

			// }
// require 'forum.php';
			// echo $$GLOBALS['variable'] = something;['selectedQ'];
			// echo $GLOBALS['selectedQ'];



			
// $SWFSound(filename)q = $_POST['question'];

	if (isset($_POST['question1'])) {


		if (empty($_POST['question1']))
		{
			// echo "rrrrrrrrr";
			}
		else{

			require 'dbcon.php';
			// $x = $_POST['question'];
			$Sq = $_POST['question1'];
			
			// $Squery = "SELECT * FROM question WHERE question = $Sq ";
			// if(){
				// $SelctdQ = $_POST['question'];

			$Squery = "SELECT DISTINCT * FROM question WHERE question = '$Sq' ";   //check if selected is in database or notes_body(server, mailbox, msg_number)
			$Sresult = $conn->query($Squery);
			// $Sresult = mysqli_query($conn,$Squery);
			// if ($Squery = "SELECT DISTINCT question FROM question WHERE question = $_POST['question'] ") {
				// $query ="SELECT DISTINCT question FROM question WHERE question LIKE '%".$_POST["query"]."%'";
				// echo "dbsdhbgnhjmgkfhjghfgdfsd";
			
			if ($Sresult->num_rows > 0) {
					
					// mysqli_query($conn, $Squery);
					// echo "<br />Collect  successfully<br />";
							   			
									
									// echo $resultA;

					       			// if ($Sresult->num_rows > 0) {
									    // // output data of each row
									    // // $n=0;
									    // // $j=1;
									    // while($Srow = $Sresult->fetch_assoc()) {
									    // 	// $n+=1;
					// echo " Question: ". $Sq."<br>";      //Display selected question from database

			?>

		<div class="container">
				  <div class="panel-group">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" href="#collapse3"><?php echo $Sq; //echo $selectedQuestion ;?></a>
				        </h4>
				      </div>
				      <div id="collapse3" class="panel-collapse collapse">
				        <div class="panel-body">I really hate this demeaning of architecture as an icon . . . Because of the reading of architecture as icons, there’s a really unfortunate way that contributions of other partnerships and other forms of knowledge are ignored. The best work is half engineering and half architecture and therefore completely dependent on the contribution of engineers. <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">Greater understanding of client issues will allow the architecture profession to be more persuasive about process change. We have seen examples where government entities have adjusted their processes as a result of direct lobbying. The trust built up with repeat clients has also demonstrated the capacity of the profession to influence procurement processes to achieve value-creating outcomes.<a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <!-- <div class="panel-body">ans 3 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 4 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 5 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div> -->
				      </div>
				    </div>
				  </div>
				</div>
			</div>	
		</div>



		

<?php
		// }
	// }

				} else {
						echo "Error: " . $Squery. "<br>" . mysqli_error($conn);?>

						<div class="container">

							<strong>NO Results Found!!</strong>
							
						</div>
						<?php


					}

		}

							
	}
	

	 else if (empty($_POST["question"])) {

	 	echo $_POST['question'];
			?>	

			<div class="container">
				<strong>No Results Found</strong>
			</div>
				

		<?php

	}

	else  {
			require 'dbcon.php';
			// $x = $_POST['question'];
			
			$Sq = $_POST['question'];
			// $Squery = "SELECT * FROM question WHERE question = $Sq ";
			// if(){
				// $SelctdQ = $_POST['question'];

			$Squery = "SELECT DISTINCT * FROM question WHERE question = '$Sq'";   //check if selected question is in database or not

			$Sresult = $conn->query($Squery);
			// $Sresult = mysqli_query($conn,$Squery);
			// if ($Squery = "SELECT DISTINCT question FROM question WHERE question = $_POST['question'] ") {
				// $query ="SELECT DISTINCT question FROM question WHERE question LIKE '%".$_POST["query"]."%'";
				// echo "dbsdhbgnhjmgkfhjghfgdfsd";
			
			if ($Sresult->num_rows > 0) {
					
					// mysqli_query($conn, $Squery);
					// echo "<br />Collect  successfully<br />";
							   			
									
									// echo $resultA;

				  	       			// if ($Sresult->num_rows > 0) {
									    // // output data of each row
									    // // $n=0;
									    // // $j=1;
									    // while($Srow = $Sresult->fetch_assoc()) {
									    // 	// $n+=1;
					// echo " Question: ". $Sq."<br>";      //Display selected question from database

			?>

		<div class="container">
				  <div class="panel-group">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" href="#collapse3"><?php echo $Sq; //echo $selectedQuestion ;?></a>
				        </h4>
				      </div>
				      <div id="collapse3" class="panel-collapse collapse">
				        <div class="panel-body">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. <!-- <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a> --></div>
				        <div class="panel-body">Greater understanding of client issues will allow the architecture profession to be more persuasive about process change. We have seen examples where government entities have adjusted their processes as a result of direct lobbying. The trust built up with repeat clients has also demonstrated the capacity of the profession to influence procurement processes to achieve value-creating outcomes.<!--  <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a> --></div>
				        <!-- <div class="panel-body">ans 3 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 4 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 5 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div> -->
				      </div>
				    </div>
				  </div>
				</div>
			</div>	
		</div>



		

<?php
		// }
	// }

				} else {
						echo "Error: " . $Squery. "<br>" . mysqli_error($conn);?>

						<div class="container">

							<strong>NO Results Found!!</strong>
							
						</div>
						<?php



							}



				}

	?>


						    
				      
				      


				
		


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