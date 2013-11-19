 <div>
<?php include 'connect.php';?>
<?php include 'functions.php';?>
<?php include 'titlebar.php';?>
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
}
?>

</div>