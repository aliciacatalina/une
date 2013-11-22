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
if(loggedin()==true){
    $user_id=$_SESSION['user_id'];
    $res = $con->query("SELECT idCampus, nombreCampus FROM Campus WHERE idCampus != 0");
    $rows = array();
    while($r = $res->fetch_assoc()) {
        $rows[] = $r;
    }
    foreach($rows as $row){
    $title = $row["nombreCampus"];
    $id = $row["idCampus"];
    echo '<div><a href="seccion.php?idCampus='.$id.'">'.$title.'</a></div>';
    }
    echo '<a href="addCampus.php">Agregar Campus</a>';
}
?>

</html>