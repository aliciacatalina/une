<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'titlebar.php';?>
<html>
	<head>
		<link rel= "stylesheet" href="dist/css/bootstrap.css" >
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="dist/js/bootstrap.js"></script>
	</head>
    <?php
    echo 'first';

     if(loggedin()==true)
		{
			echo $_GET['description'];

			$gettitle = "SELECT nombreTitlo FROM titulos WHERE idTitulo=".$_GET['title'];
			$title = $con->query($gettitle) or die($con->error);
			$getdescription = "SELECT descripcion FROM descripcion WHERE idDescripcion=".$_GET['description'];
			$res = $con->query($getdescription) or die($con->error);
			$trows = array();
			$rows = array();
			while($tr = $title->fetch_assoc()) {
		        $trows[] = $tr;
		    }
		    while($r = $res->fetch_assoc()) {
		        $rows[] = $r;
		    }
		    foreach($trows as $trow){
		    $title = $trow["nombreTitlo"];
			echo '<div><h3> '.$title.' </h3></div>';
		    }
		    foreach($rows as $row){
		    $description = $row["descripcion"];

		    }


        }
    ?>

	<div class="container">
		<form role="form" action="" method="post">
			<div class="form-group">
				<h2> <?php $title ?> </h2>
				<h3>Editar Descipcion</h3>
				<label for="">Descripcion</label>
				    <textarea rows="4" cols="50" name="edited_description"><?php echo $description; ?></textarea>
				</div>
				<div class="row">
					<div class="col-md-4">
					<button type='submit' name='submit' value='save' class="btn btn-lg btn-primary btn-block">GuardarCambios</button>
				</div>
			</div>
		</form>
	</div>
	<?php
		if(isset($_POST['submit'])){
			if (loggedin() == 'true') {

			    $newdescription = $_POST['edited_description'];
			    //Cambiar el estatus, pero no se cual es cuaaal
			    $query = "UPDATE `descripcion` SET `descripcion`= '" .$newdescription. "'WHERE `idDescripcion`=".$_GET['description'];
			    $result = $con->query($query) or die($con->error);

			    if(! $result )
				{
				  die('Could not enter data: ' . mysql_error());
				}
				echo '<div class="alert alert-success">Entered data successfully</div>';
			}
		}
	?>
</html>