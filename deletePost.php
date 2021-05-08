<?php 
    $id = $_GET['id'];
    require_once('php/db.php');
    $mysqli->query("DELETE FROM blog WHERE id='$id'");
    echo "success";
?>