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
    echo 'first';

     if(loggedin()==true)
		{
			echo $_GET['description'];

			$gettitle = "SELECT nombreTitlo FROM titulos WHERE idTitulo=".$_GET['title'];
			$title = $con->query($gettitle) or die($con->error);
			$getdescription = "SELECT descripcion FROM descripcion WHERE idDescripcion=".$_GET['description'];
			$res = $con->query($getdescription) or die($con->error);
			$trows = array();
			$rows = array();
			while($tr = $title->fetch_assoc()) {
		        $trows[] = $tr;
		    }
		    while($r = $res->fetch_assoc()) {
		        $rows[] = $r;
		    }
		    foreach($trows as $trow){
		    $title = $trow["nombreTitlo"];
			echo '<div><h3> '.$title.' </h3></div>';
		    }
		    foreach($rows as $row){
		    $description= $row["descripcion"];
		    echo '
		    	<form action="" method="post">
		    		<textarea name="description">'.$description.'</textarea>
		    		<button type="submit" name="submit" value="save" class="btn btn-lg btn-primary btn-block">Guardar Cambios</button>
		    	</form>';

		    	if(isset($_POST['submit'])){

		    		$newdescription = $_GET['description'];
		    		echo $newdescription;
		    	}
		    }

			 if(! $res )
			{
			  die('Could not enter data: ' . mysql_error());
			}
			echo "Entered data successfully\n";

        }
    ?>
</html>