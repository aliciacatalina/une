<?php include 'functions.php' ;?>
<?php include 'connect.php' ;?>

<h1> Agregar Titulo </h1>
<div class="container">


<form action ="" method="post" class="form-signin">
<h3>Nueva Seccion:</h3>
Nombre:<br/>
<input type='text' name='title-name' class="form-control"/>
<br/><br/>
Tipo:<br/>
<input type='text' name='type' class="form-control"/>
<br/><br/>
Idioma:
<input type='text' name='language' class="form-control"/>
Opcional
<input type='text' name='optional' class="form-control"/>
Id: (Arreglen esto en la DB)
<input type='text' name='id' class="form-control"/>
<button type='submit' name='submit' value='login' class="btn btn-lg btn-primary btn-block">Agregar Titulo</button>
</form>

<?php
if(isset($_POST['submit'])){

	if(loggedin()==true)
		{
			$titlename = $_POST['title-name'];
		    $optional = $_POST['optional'];
		    $language = $_POST['language'];
		    $idsection = $_GET['section'];
		    $idtitle = "";

			$user_id=$_SESSION['user_id'];
			$log=$con->prepare("SELECT idUsuario, tipoUsuario FROM Usuarios WHERE idUsuario='$user_id'");
			$log->execute(); // missing ()
			$log->store_result();
			$log->bind_result($user_id, $user_level);
			if($log->fetch()) //fetching the contents of the row
			{
				if($user_level=='superadmin')
				{
					$res = $con->query("INSERT INTO `titulos`(`idTitulo`, `idioma`, `nombreTitlo`, `idSeccion`, `opcional`) VALUES ('" . $idtitle . "', '" . $language . "', '" . $titlename . "', '" .
               $idsection . "', '" . $optional .  "')");
				}
				else {
					echo "You are not allowed here";
				}
			}
	    if(! $res )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully\n";
	}
}

?>