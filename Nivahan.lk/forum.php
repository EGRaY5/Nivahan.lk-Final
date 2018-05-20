 <?php 
session_start();
if (isset($_SESSION['log_count'])){
	$log_count = $_SESSION['log_count'];
}
	$replyErr="";
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

					 <div class="form-group">
					<form class="navbar-form " method="post" action="selectedQuestion.php">
					
				     <!-- <input type="text" class="form-control" placeholder="Search Question"> -->

				        <div style="width:500px;">
					        <!-- <input type="text" name="question" id="question" class="form-control" placeholder="Search Question"> -->
					        <input type="text" name="question" id="question" class="form-control" placeholder="Search Question">
					
					    	<button type="submit" class="btn btn-default" > SEARCH </button>
					    	
						</div>		
				      
					    <div id="questionList"></div>
					    <script>
					        $(document).ready(function(){
					            $('#question').keyup(function(){
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
					                    $('#question').val($(this).text());
					                    $('#questionList').fadeOut();
					                });
					            });
					        });
					    </script>

				      </form>
				      <?php //	$selectedQuestion = @$_POST["question"]; ?>
				      <form class="navbar-form " action="AskQuestion.php">
				      
				      <div class="col-sm-3 col-md-6 col-lg-4" ;">
							
						<button type="submit"  class="btn btn-default" > Ask Question </button>
				
					</div>
				      
				    </form>
				    <div>
				    	<?php  //if(isset($_POST['question'])){echo $_POST['question']; echo "sdftf";}?>
				    </div>
				</div>

				</div>
			</center>
		</div>
			

			


				<!-- <div class="container">
				  <div class="panel-group">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" href="#collapse3"> 
				        </h4>
				      </div>
				      <div id="collapse3" class="panel-collapse collapse">
				        <div class="panel-body">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 2 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 3 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 4 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				        <div class="panel-body">ans 5 <a><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a> <a><i class="fa fa-trash pull-right" aria-hidden="true"></i></a></div>
				      </div>
				    </div>
				  </div>
				</div>
			</div>	
		</div> -->
<?php
		
		// require('dbcon.php');

		// $sql = "SELECT * FROM question ";
		// $result = $conn->query($sql);

		// if (mysqli_query($conn, $sql)) {
  //  			echo "<br />Collect records successfully<br />";
   			
		// } else {
  //   		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		// }

		// // echo "$result";

		// if ($result->num_rows > 0) {
		//     // output data of each row
		//     while($row = $result->fetch_assoc()) {
		//     	echo "<div class='container'>";
		//         echo "Question_type: " . $row["question_type"]. " - Question: " . $row["question"]." - Name: " . $row["name"]."- Email: " . $row["email"]. "<br>";
		//         echo "</div>";
		//     }
		// } else {
		//     echo "0 results";
		// }		

?>
<?php 
				echo "<br /><br />";	
							require('dbcon.php');

								$sql = "SELECT * FROM question ";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								    // output data of each row
								    $i=0;
								    // $j=1;
								    while($row = $result->fetch_assoc()) {
								    	$i+=1;
								    	// $j+=2;
								    	// echo " Question: " . $row["question"]. "<br>"; //Display Questions from database


								     ?>

		<div class="row">

				<div class="container">
				  <div class="panel-group">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				        	<!-- <a data-toggle="collapse" href="#collapse1"> -->
				        	
				          		<a data-toggle="collapse" href="#collapse<?php echo $i ;?>" >  <!-- related to 'Question' -->
				          		<?php 
									echo " Question: " . $row["question"]. "<br>"; //Display Questions from database
								?>
								     
									</a>
							<div class="row">
				          			<div class="col-sm-3 col-md-6 col-lg-4" ;">

									    
											 <a data-toggle="collapse" href="#collapseR<?php echo $i;?>"> <!-- related to "Reply" button --> 
												

											<button type="button" class="btn btn-link btn-sm">Reply</button>
												</a>

											<!-- <button type="button" class="btn btn-link btn-sm">Report</button>     link to report --> 
											<button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#myModal">Report</button>

											  <div class="modal fade" id="myModal" role="dialog">
											    <div class="modal-dialog">
											    
											      <div class="modal-content">
											        <div class="modal-header">
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          <h4 class="modal-title">Report this Post :</h4>
											        </div>
											        <div class="modal-body">
											          <p>Do you want to report this post?</p>
											          <!-- <button type="submit" class="btn-default"> Yes </button>
											          <button type="submit" class="btn-default"> No </button>
 -->
											        </div>
											        <div class="modal-footer">
											        	<button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
											          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
											        </div>
											      </div>
											      
											    </div>
											  </div>

									</div>

							</div>

				        
				        </h4>
				      </div>
					<form method="post" >
				      <div id="collapseR<?php echo $i;?>" class="panel-collapse collapse"> <!-- show reply box for relevant question -->
				      
				      	<textarea name="reply<?php echo $i; ?>" cols="155" rows="3" id="reply" placeholder="Type your Reply..."></textarea> <!-- reply box -->
				      	
				      	<!-- &nbsp;
						&nbsp; -->
				      	<input type="submit" name="submitR<?php echo $i; ?>" value="Submit"  />


						<!-- <span class="Error" <?php //echo $replyErr;?> > </span> -->

				      </div>

				  </form>

			
				    <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">  <!-- show answers for relevant question -->		
				    <?php

				    			$sqlA = "SELECT * FROM answer WHERE q_id=$i";
								$resultA = $conn->query($sqlA);

								// if (mysqli_query($conn, $sqlA)) {
						  //  			echo "<br />Collect records successfully<br />";
						   			
								// } else {
						  //   		echo "Error: " . $sqlA . "<br>" . mysqli_error($conn);
								// }

								// echo $resultA;

				       			if ($resultA->num_rows > 0) {
								    // output data of each row
								    $j=0;
								    // $j=1;
								    while($rowA = $resultA->fetch_assoc()) {
								    	$j+=1;
								    	// echo " Answer: ". $rowA["reply"]."<br>";         //Display Answers from database


						?>		

						

				        <div class="panel-body">

				        	<?php 
								echo " Answers 	: ". $rowA["reply"]."<br>"; //Display Answers from database
								?>


				        	
				        </div>
				        				      
				      <?php 
				      			}
				      		}	 
				      	?>
				      	</div>
				    </div>
				  </div>
				</div>

				<?php	

					// require('dbcon.php');

				 // function test_input($data) {
					//   $data = trim($data);
					//   $data = stripslashes($data);
					//   $data = htmlspecialchars($data);
					//   return $data;
					// }

				if (empty($_POST["reply".$i])) {
				    $replyErr = "* Please type your Reply";
				  } else {
				    $reply = test_input($_POST["reply".$i]);
				    // check if reply is entered
				    
				  }

				 

					// $reply = @$_POST["reply".$i];

					// if (isset($_POST['submitR'.$i])) {
					// 	// $i/=2;
										
					// 	$sqlR = "INSERT INTO answer (q_id,reply)
					// 		VALUES ('".$i."', '".$reply."')";

					// 	if (mysqli_query($conn, $sqlR)) {
					//    			echo "New reply created successfully";
					// 			}
					// 	 else {
					//     		echo "Error: " . $sqlR . "<br>" . mysqli_error($conn);
					// 			}
					// 		}
						 if (isset($_POST['submitR'.$i])) {           
								if (empty($_POST["reply".$i])) {?>
					  		<script>
							
							function mf2(){
								alert("Invalid Reply !!");
							}
							mf2();
						 	</script> 
					 	<?php

							    
							  } else {
							    $reply = test_input($_POST["reply".$i]);
							    // check if reply is entered
							   $sqlR = "INSERT INTO answer (q_id,reply)
								VALUES ('".$i."', '".$reply."')";    //Insert non-empty reply into the table

								if (mysqli_query($conn, $sqlR)) {
					   			// echo "New reply created successfully";?>
					    	<script>
							function mf() {
							    alert("New Reply submitted successfully !");
							}
							
							mf();
						 	</script> -->
					 <?php
							} else {
					    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}

							}
						}

				}
								}else {
								    echo "0 results";
								}


						?>


				<?php

				// 	require('dbcon.php');
					
				// 	//$q = "SELECT q_id FROM question";

				// 	$reply = @$_POST["details"];

				// 	if (isset($_POST['submit'])) {
				
				// 	$sql = "INSERT INTO answer (q_id,reply)
				// 		VALUES ('".$i."', '".$reply."')";

				// 	if (mysqli_query($conn, $sql)) {
			 //   			echo "New reply created successfully";
				// 	} else {
			 //    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				// 	}
				// }

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