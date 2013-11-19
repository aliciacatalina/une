 <div>
<?php include 'titlebar.php';?>
<?php
if(loggedin()==true){
    $user_id=$_SESSION['user_id'];
    $res = $con->query("SELECT idTitulo, nombreTitlo FROM Titulos");
    $rows = array();
    while($r = $res->fetch_assoc()) {
        $rows[] = $r;
    }
    foreach($rows as $row){
    $title = $row["nombreTitlo"];
    $id = $row["idTitulo"];
    echo '<div><a href="edit.php?title='.$id.'">'.$title.'</a></div>';
    }
}
?>

</div>
