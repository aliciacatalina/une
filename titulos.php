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
    if (!isset($_GET['seccion'])) exit;

		if(loggedin()==true)
		{
			$user_id=$_SESSION['user_id'];
			$log=$con->prepare("SELECT idUsuario, tipoUsuario FROM Usuarios WHERE idUsuario='$user_id'");
			$log->execute(); // missing ()
			$log->store_result();
			$log->bind_result($user_id, $user_level);
			if($log->fetch()) //fetching the contents of the row
			{
				if($user_level=='superadmin')
				{
					$res = $con->query("SELECT nombreTitlo, idTitulo FROM Titulos WHERE idSeccion=".$_GET['seccion']);
					$rows = array();

					while($r = $res->fetch_assoc())
					{
					  $rows[] = $r;
					}
					foreach($rows as $row)
					{
						$title = $row["nombreTitlo"];
						$id = $row["idTitulo"];

						echo '<div><a href="descripciones.php?title='.$id.'&idCampus='.$_GET['idCampus'].'">'.$title.'</a></div>';
					}
				}

				if($user_level=='admin')
				{
					$res = $con->query("SELECT nombreTitlo, idTitulo FROM Titulos WHERE idSeccion=".$_GET['seccion']);

					$rows = array();
					while($r = $res->fetch_assoc())
					{
						$rows[] = $r;
					}
					foreach($rows as $row)
					{
						$seccion = $row["nombreTitlo"];
						$id = $row["idTitulo"];
						//$newdir = $con->query("SELECT
						echo '<div><a href="descripciones.php?title='.$id.'">'.$seccion.'</a></div>';
					}
				}
			}
		}
?>

</html>
