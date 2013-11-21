 <div>
 <?php include 'titlebar.php';?>
<?php
if(loggedin()==true)
{
	$user_id=$_SESSION['user_id'];
	$log=$con->prepare("SELECT idUsuario, tipoUsuario FROM usuarios WHERE idUsuario='$user_id'");
	$log->execute(); // missing ()
	$log->store_result();
	$log->bind_result($user_id, $user_level);
	if($log->fetch()) //fetching the contents of the row
	{
		if($user_level=='superadmin')
		{?>
			<a href = 'listaCampus.php'>Lista Campus</a>
		<?php
			$res = $con->query("SELECT idSeccion, nombreSeccion FROM seccion WHERE tipo='2'");
			$rows = array();
			while($r = $res->fetch_assoc())
			{
				$rows[] = $r;
			}
			foreach($rows as $row)
			{
				$seccion = $row["nombreSeccion"];
				$id = $row["idSeccion"];
				//$newdir = $con->query("SELECT
				echo '<div><a href="titulosSuperAdmin.php?seccion='.$id.'">'.$seccion.'</a></div>';
			}

			echo '<div><a href="addSection.php">Agregar Seccion</a></div>';

		}

		if($user_level=='admin')
		{
			$res = $con->query("SELECT idSeccion, nombreSeccion FROM seccion WHERE tipo='1'");
			$rows = array();
			while($r = $res->fetch_assoc())
			{
				$rows[] = $r;
			}
			foreach($rows as $row)
			{
				$seccion = $row["nombreSeccion"];
				$id = $row["idSeccion"];
				//$newdir = $con->query("SELECT
				echo '<div><a href="titulos.php?seccion='.$id.'">'.$seccion.'</a></div>';
			}
		}
	}
}?>

</div>
