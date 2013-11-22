<?php include 'functions.php' ;?>
<?php include 'connect.php' ;?>
<?php include 'titlebar.php' ;?>
<html>
<head>
	<link rel= "stylesheet" href="dist/css/bootstrap.css" >
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="dist/js/bootstrap.js"></script>
</head>
<div class="container">
	<form role="form" action="" method="post">
		<div class="form-group">
		<h2> Agregar Seccion </h2>
		<h3>Nueva Seccion:</h3>
		<label for="name">Nombre</label>
		    <input type="text" class="form-control" id="name" placeholder="Ingresa tu Nombre" name="section-name">
		<label for="tipo">Tipo</label>
		    <input type="text" class="form-control" id="tipo" placeholder="Ingres el Tipo" name="type">
		<label for="ioma">Idioma</label>
		    <input type="text" class="form-control" id="idioma" placeholder="Ingresa el Idioma" name="language">
		<label for="opcional">Opcional</label>
			<select class="form-control" name="opcional">
			  <option value="0">0</option>
			  <option value="1">1</option>
			</select>

		</div>
		<div class="row">
			<div class="col-md-4">
			<button type='submit' name='submit' value='login' class="btn btn-lg btn-primary btn-block">Agregar Seccion</button>
			</div>
		</div>
</form>

<?php
if(isset($_POST['submit'])){
	if (loggedin() == 'true') {

	    $sectionname = $_POST['section-name'];
	    $type = $_POST['type'];
	    $language = $_POST['language'];
	    $optional = $_POST['optional'];
	    $idsection = '';

	    $query = "INSERT INTO `seccion`(`idSeccion`, `idioma`, `nombreSeccion`, `opcional`, `Tipo`) VALUES ('" . $idsection .
                "', '" . $language . "', '" . $sectionname . "', '" . $optional . "', '" . $type . "')";
	    $result = $con->query($query) or die($con->error);
	    echo $query;
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