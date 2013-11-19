 <div>
<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'titlebar.php';?>

<?php
if(loggedin()==true)
{
	$user_id=$_SESSION['user_id'];
	$log=$con->prepare("SELECT idUsuario, tipoUsuario FROM Usuarios WHERE idUsuario='$user_id'");
	$log->execute(); // missing ()
	$log->store_result(); 
	$log->bind_result($user_id, $user_level);
	
	$gettit = $con->query("SELECT idUsuario, idCampus FROM Usuarios WHERE idUsuario='$user_id'");
	$crows = array();	
	
	if($log->fetch()) //fetching the contents of the row
	{
		if($user_level=='superadmin')
		{
			$res = $con->query("SELECT idSeccion, nombreSeccion FROM Seccion WHERE tipo='1'");
			$rows = array();
			while($r = $res->fetch_assoc()) 
			{
				$rows[] = $r;
			}
			foreach($rows as $row)
			{
				$title = $row["nombreSeccion"];
				$id = $row["idSeccion"];
				echo '<div><a href="titulos.php?seccion='.$id.'&idCampus='.$_GET['idCampus'].'">'.$title.'</a></div>';
			}
		}
		
		if($user_level=='admin')
		{
			$res = $con->query("SELECT idSeccion, nombreSeccion FROM Seccion WHERE tipo='1'");
			$rows = array();
			while($r = $res->fetch_assoc()) 
			{
				$rows[] = $r;
			}
			foreach($rows as $row)
			{
				$title = $row["nombreSeccion"];
				$id = $row["idSeccion"];
				echo '<div><a href="titulos.php?seccion='.$id.'">'.$title.'</a></div>';
			}

		}
	}
}
?>

</div>
