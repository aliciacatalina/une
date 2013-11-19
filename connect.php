<?php
session_start();
$con = new mysqli("localhost", "root", "root", "UNE");
if ($con->connect_errno) {
    echo "No se pudo conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
else {
    echo "Connected";
}
?>

