<?php include 'functions.php' ;?>
<?php include 'connect.php' ;?>
<?php include 'titlebar.php' ;?>
<html>
<head>
	<link rel= "stylesheet" href="dist/css/bootstrap.css" >
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="dist/js/bootstrap.js"></script>
</head>
<h1> Agregar Seccion </h1>
<div class="container">


<form action ="" method="post" class="form-signin">
<h3>Nueva Seccion:</h3>
Nombre:<br/>
<input type='text' name='section-name' class="form-control"/>
<br/><br/>
Tipo:<br/>
<input type='text' name='type' class="form-control"/>
<br/><br/>
Idioma:
<input type='text' name='language' class="form-control"/>
Opcional
<input type='text' name='optional' class="form-control"/>
<button type='submit' name='submit' value='login' class="btn btn-lg btn-primary btn-block">Agregar Seccion</button>
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
		echo "Entered data successfully\n";
	}
}
?>
</html>