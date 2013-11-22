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

     if(loggedin()==true)
		{
			echo $_GET['description'];

			$gettitle = "SELECT nombreTitlo FROM titulos WHERE idTitulo=".$_GET['title'];
			$title = $con->query($gettitle) or die($con->error);

			$trows = array();
			while($tr = $title->fetch_assoc()) {
		        $trows[] = $tr;
		    }
		    foreach($trows as $trow){
		    $title = $trow["nombreTitlo"];
			echo '<div><h3> '.$title.' </h3></div>';
		    }


        }
    ?>

	<div class="container">
		<form role="form" action="" method="post">
			<div class="form-group">
				<h2> <?php $title ?> </h2>
				<h3>Agregar Descipcion</h3>
				<label for="">Descripcion</label>
				    <textarea rows="4" cols="50" name="description"></textarea>
				<label for="idioma">Idioma</label>
		    		<input type="text" class="form-control" id="idioma" placeholder="Ingresa el Idioma" name="language">
		    	<label for="subtitle">Subtitulo</label>
		    		<input type="text" class="form-control" id="subtitle" placeholder="Ingresa algun subtitulo" name="subtitulo">
		    	<label for="campus">Campus</label>
		    		<input type="text" class="form-control" id="campus" placeholder="Numero de Campus" name="campus">
				</div>
				<div class="row">
					<div class="col-md-4">
					<button type='submit' name='submit' value='save' class="btn btn-lg btn-primary btn-block">GuardarCambios</button>
				</div>
			</div>
		</form>
	</div>
	<?php
		if(isset($_POST['submit'])){
			if (loggedin() == 'true') {

			    $newdescription = $_POST['description'];
			    $language = $_POST['language'];
			    $subtitle = $_POST['subtitle'];
			    $idDescripcion = '';
			    $idcampus = $_POST['campus'];
			    $status = '1';
			    //falta validra el campus!
			    $query = "INSERT INTO `descripcion` (`idDescripcion`, `idCampus`, `idioma`, `idTitulo`, `descripcion`, `subtitulo`, `status`) VALUES ('" . $idDescripcion .
                "', '" . $idcampus . "', '" . $language . "', '" . $_GET['title'] . "', '" . $newdescription . "', '" . $subtitle . "', '" . $status . "')";
			    $result = $con->query($query) or die($con->error);
			    echo $query;
			    if(! $result )
				{
				  die('Could not enter data: ' . mysql_error());
				}
				echo '<div class="alert alert-success">Entered data successfully</div>';
			}
		}
	?>
</html>