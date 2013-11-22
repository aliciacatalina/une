<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'titlebar.php';?>
<html>
<head>
	<link rel= "stylesheet" href="dist/css/bootstrap.css" >
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="dist/js/bootstrap.js"></script>
</head>
<div id="sidebar" class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
<div class="list-group">
    <?php
    if (!isset($_GET['seccion'])) exit;
    	$section = $_GET['seccion'];
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

						echo '<a class="list-group-item" href="descripcionesSuperAdmin.php?title='.$id.'">'.$title.'</a>';
					}

					echo '<div class="container">';
					echo	'<a href="addTitle.php?section='.$section.'">Agregar Titulo</a></div>';
				}
			}
		}
?>
</div>
</div>

</html>
