<?php require "config/config.php";  ?>

<?php 
if(isset($_SESSION['username'])) {
	// TO SHOW NAME OF USER IN NAVIGATION BAR
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JS Typing Speed Test</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="//db.onlinewebfonts.com/c/6cb4254d224fa60f15c496c4720b5c9a?family=Ninja+Naruto" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="vendor/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<style>
		.masthead {
			height: 100px;
		}
		.nav_menu a {
			margin: 33px 15px 0px 0px;
		}
		.masthead h1 {
			margin: 0px;
			padding: 20px;
		}
		.intro p {	
		    line-height: 20px;
    		padding: 14px;
		}
		
		.dataTables_filter {
			display: none;
		}

		#myTable_length label {
			font-size: 14px;
    		margin: 0px;
    	}
		#myTable_length select {
			height: 30px;
   			font-size: 16px;
		    margin: -4px -17px 0px 6px;
		}

		table.dataTable tbody th,table.dataTable tbody td {
			padding: 0px 10px;
			border-bottom:1px solid #111;
		}

		.dataTables_empty {
			display: none;
		}

		#myTable_info {
			display: none;	
		}
		.dataTables_wrapper .dataTables_paginate{
			float:right;
			text-align:right;
			padding-top: 0px;
		}

		table.dataTable thead .sorting, table.dataTable thead .sorting_asc,
		table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled,
		table.dataTable thead .sorting_desc_disabled {
			cursor:pointer;*cursor:hand;
			background-repeat:no-repeat;
			background-position:center right
		}

		.dataTables_wrapper .dataTables_paginate .paginate_button {
			padding: 0px;
		}
	</style>

</head>

<body>
	
	<center>
		<div class="masthead">
			<div class="left_nav">
				<h1 id="logo">TyperGeeks</h1>
			</div>
			<div class="right_nav">
				<div class="nav_menu">
					<ul>
						<li><a href="#">
							<?php if(isset($_POST['first_name']) && isset($_POST['last_name'])) {
									echo $_POST['first_name'] . ' ' . $_POST['last_name'];	
								} else {
									echo $user['first_name'] . ' ' . $user['last_name'];
								}
							?>
							</a>
						</li>
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Typing Lesson</a></li>
						<li><a href="#">Typing Game</a></li>
						<li><a href="#">Account</a></li>
						<li><a href="include/handler/logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</center>

	<p style="margin: 5px; text-align: center;"><b style="color: red;">Note :-</b> Hit enter at last in textarea to show your result in scoreboard.</p>

	<center>
		<main class="main">
			<article class="intro">
				<p>This is a typing test. Your goal is to duplicate the provided test, 	EXACTLY, in the field below. The timer starts when you start typing, and only stops when you match this text exactly. Good luck!</p>
			</article>
		
			<section id="main_page" style="display: block;">
					<section class="record-list">
						<div id="origin-text1">
							<p>Performance record</p>
						</div>

						<div class="result-table">
							<table id="myTable" class="table table-fluid">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Level</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									<?php 

									$query = mysqli_query($con, "SELECT * FROM data");
									while($row = mysqli_fetch_array($query)) {
										echo "<tr>";
										echo "<td>" . $row['id'] . "</td>";
										echo "<td>" . $row['first_name'] . " " . $row['last_name']; "</td>";
										echo "<td>" . $row['userlevel'] . "</td>";
										echo "<td>" . $row['usertiming'] . "</td>";		
										echo "</tr>";
									}
 									?>
								</tbody>
							</table>
						</div>
					</section>

					<section class="test-area">
						<div id="origin-text">
							<p><?php echo $_POST['paragraph']; ?></p>
						</div>

						<div class="test-wrapper">
							<form id="myForm" action="typing.php" method="POST">
								<textarea id="test-area" name="textarea" rows="7" placeholder="The clock starts when you start typing."></textarea>
								
					<?php 
						if(isset($_POST['first_name']) && isset($_POST['last_name'])) {
							$first = $_POST['first_name']; 
							$last = $_POST['last_name'];
						} else {
							$first = $user['first_name'];
							$last = $user['last_name'];
						}
						$userLevel = $_POST['select-level'];
					?>
							<input type="hidden" id="FirstName" name="first_name" value="<?php echo $first; ?>" disabled>
							<input type="hidden" id="LastName" name="last_name" value="<?php echo $last;?>" disabled>
							<input type="hidden" id="selectLevel" name="selectLevel" value="<?php echo $userLevel;?>" disabled>

							</form>
						</div>

						<div class="meta">
							<section id="clock">
								<div class="timer">00:00:00</div>
							</section>

							<button id="reset">Start over</button><br><br>
							<a href="index.php" 
							style="word-spacing: 1px;
							    border-bottom: 1px dashed #E10;
							    color: #e0160d;
							    text-decoration: none;
							    margin: 0px 480px 0px 0px;">
								Modify your paragraph here.</a>
						</div>

						<div class="test-result">
							<h4 id="result" style="display: none;">Time for your typing is: </h4>	
						</div>
					</section>
			</section>
			
			<?php include("include/footer.php"); ?>
		</main>
	</center>


<!-- 	First take vaiable in to php variable then convert it into javascript using json_encode function  -->
<!-- 	<?php 
    	// if(isset($_POST['first_name']) && isset($_POST['last_name'])) {
    	  // $first = $_POST['first_name'];
    	  // $last = $_POST['last_name'];
    	// } else {
    	  // $first = $user['first_name'];
    	  // $last = $user['last_name'];
    	// }
    	// $userLevel = $_POST['select-level'];
  	?> -->

  	<?php 

  	$query = mysqli_query($con, "SELECT * FROM data where first_name='$first' AND last_name = '$last'");
  	$row = mysqli_fetch_array($query);
  	$id = $row['id'];

  	?>

  	<!-- "aLengthMenu": [[5, 8, 10, 100], [5, 8, 10, "All"]], -->

	<script>
  		$(document).ready( function () {
    		$('#myTable').dataTable({
        		"aLengthMenu": [[5, 8, 10], [5, 8, 10]],
        		"iDisplayLength": 8
    		});
		});

		var id = <?php echo json_encode($id); ?>;
	</script>

	<?php 


	?>

		<!-- To Convert PHP variable into php variable -->
	<!-- <script type="text/javascript">
		// var timing = document.querySelector(".timer").innerHTML;
		// var firstName = <?php 
								// echo json_encode($first); ?>;
    	// var lastName = <?php 
    							// echo json_encode($last); ?>;  
	    // var userLevel = <?php 
	    						// echo json_encode($userLevel); ?>;
	</script> -->

	<script type="text/javascript" src="resources/js/typing_script.js"></script>
</body>
</html>