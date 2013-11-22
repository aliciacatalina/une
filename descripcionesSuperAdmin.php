<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'titlebar.php';?>
<html>
	<head>
		<link rel= "stylesheet" href="dist/css/bootstrap.css" >
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="dist/js/bootstrap.js"></script>
	</head>
	<div class="container">
	<div class="jumbotron">
    <?php
    if (!isset($_GET['title'])) exit;
        if(loggedin()==true)
		{
            $user_id=$_SESSION['user_id'];
			$log=$con->prepare("SELECT idUsuario, tipoUsuario FROM Usuarios WHERE idUsuario='$user_id'");
			$log->execute(); // missing ()
            $log->store_result();
            $log->bind_result($user_id, $user_level);

			$gettit = $con->query("SELECT idUsuario, idCampus FROM Usuarios WHERE idUsuario='$user_id'");
			$crows = array();

			while($c = $gettit->fetch_assoc())
			{
				$crows[] = $c;
			}

			foreach($crows as $row)
			{
				$campus = $row["idCampus"];
			}


            if($log->fetch()) //fetching the contents of the row
            {
                if($user_level=='superadmin')
				{
					$gettit = $con->query("SELECT nombreTitlo FROM titulos WHERE idTitulo=".$_GET['title']);
					$res = $con->query("SELECT descripcion, idDescripcion FROM descripcion WHERE idTitulo=".$_GET['title']." AND idCampus ='$campus'");
					$rows = array();
					$trows = array();

					while($r = $res->fetch_assoc())
					{
						$rows[] = $r;
					}

					while($t = $gettit->fetch_assoc())
					{
						$trows[] = $t;
					}

					foreach($trows as $row)
					{
						$titulo = $row["nombreTitlo"];
						echo '<div><h3> '.$titulo.' </h3></div>';
					}
	echo "</div>";
					foreach($rows as $row)
					{
						$descripcion = $row["descripcion"];
						$id = $row["idDescripcion"];
						echo '<div id="descripcion"> '.$descripcion.' </div>';
						echo '<button class="btn"><a href="editDescription">Editar</a></button>';
					}
                }
            }
		}

?>
	
	</div>
</html>