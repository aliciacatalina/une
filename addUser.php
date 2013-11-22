<?php include 'functions.php' ;?>
<?php include 'connect.php' ;?>
<?php include 'titlebar.php' ;?>
<html>
<head>
	<link rel= "stylesheet" href="dist/css/bootstrap.css" >
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="dist/js/bootstrap.js"></script>
</head>
<h1> Agregar Usuario </h1>
<div class="container">


<form action ="" method="post" class="form-signin">
<h3>Nueva Usuario:</h3>
EMail:<br/>
<input type='text' name='iduser' class="form-control"/>
<br/><br/>
Nombre:<br/>
<input type='text' name='username' class="form-control"/>
<br/><br/>
Password:<br/>
<input type='text' name='password' class="form-control"/>
Tipo (Administrador/Superadministrador):<br/>
<input type='text' name='utype' class="form-control"/>
<br/><br/>
Campus:
<input type='text' name='campus' class="form-control"/>

<button type='submit' name='submit' value='login' class="btn btn-lg btn-primary btn-block">Agregar Seccion</button>
</form>

<?php
if(isset($_POST['submit'])){
	if (loggedin() == 'true') {

	    $username = $_POST['username'];
	    $utype = $_POST['utype'];
	    $password = $_POST['password'];
	    $campus = $_POST['campus'];
	    $iduser = $_POST['iduser'];

	    $query = "INSERT INTO `usuarios`(`idUsuario`, `password`, `nombreUsuario`, `tipoUsuario`, `idCampus`) VALUES ('" . $iduser .
                "', '" . $password . "', '" . $username . "', '" . $utype . "', '" . $campus . "')";
	    $result = $con->query($query) or die($con->error);

	    if(! $result )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully\n";
	}
}
?>
</html>