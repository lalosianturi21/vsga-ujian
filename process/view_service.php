<?php
session_start();
require '../config/conn.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = mysqli_query($con, "SELECT * FROM services WHERE service_id='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query, MYSQLI_ASSOC); // Use MYSQLI_ASSOC to get an associative array
    echo json_encode($data);
}
