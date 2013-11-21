<?php include 'functions.php';?>
<?php include 'connect.php';?>
<h1> Usuarios </h1>
<?php
echo loggedin();
if(loggedin()==true)
{
	echo 'sup';
$user_id=$_SESSION['user_id'];
	$log=$con->prepare("SELECT idUsuario, tipoUsuario FROM usuarios WHERE idUsuario='$user_id'");
	$log->execute(); // missing ()
	$log->store_result();
	$log->bind_result($user_id, $user_level);

	$gettit = $con->query("SELECT idUsuario, idCampus FROM usuarios WHERE idUsuario='$user_id'");
	$crows = array();

	if($log->fetch()) //fetching the contents of the row
	{
		if($user_level=='superadmin')
		{
			$res = $con->query("SELECT * FROM usuarios");
			$rows = array();
			while($r = $res->fetch_assoc())
			{
				$rows[] = $r;
			}
			foreach($rows as $row)
			{
				$user = $row["idUsuario"];
				$utype = $row["tipoUsuario"];
				echo '<div>Usuario ' .$user. '</div>';
				echo '<div>Tipo ' .$utype . '</div>';
			}

			echo '<div><a href="addUser.php">Agregar Usuario</a></div>';
		}
	}
}
?>