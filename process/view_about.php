<?php
session_start();
require '../config/conn.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($con,"SELECT * FROM about WHERE idabout='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
    echo json_encode($data);
}