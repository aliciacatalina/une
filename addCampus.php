<?php include 'functions.php' ;?>
<?php include 'connect.php' ;?>
<?php include 'titlebar.php' ;?>
<html>
	<head>
		<link rel= "stylesheet" href="dist/css/bootstrap.css" >
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="dist/js/bootstrap.js"></script>
	</head>
	<h1> Agregar Campus </h1>
	<div class="container">

		<form action ="" method="post" class="form-signin">
		<h3>Nuevo Campus:</h3>
		Nombre:<br/>
		<input type='text' name='campus-name' class="form-control"/>


		<button type='submit' name='submit' value='login' class="btn btn-lg btn-primary btn-block">Agregar Campus</button>
		</form>

		<?php
		if(isset($_POST['submit'])){
			if (loggedin() == 'true') {

			    $campusname = $_POST['campus-name'];
			    $idcampus = '';

			    $query = "INSERT INTO `campus`(`idCampus`, `nombreCampus`) VALUES ('" . $idcampus .
		                "', '" . $campusname  . "')";
			    $result = $con->query($query) or die($con->error);

			    if(! $result )
				{
				  die('Could not enter data: ' . mysql_error());
				}
				echo '<div class="alert alert-success">Entered data successfully</div>';
			}
		}
		?>
	</div>
</html>