<?php 
session_start();
require '../config/conn.php';
require '../config/function.php';

if (isset($_POST['simpan'])) {
    $service_name = ucwords($_POST['service_name']);
    $service_description = $_POST['service_description'];
    $service_icon = $_POST['service_icon'];
    $service_price = $_POST['service_price'];


    $stmt = $con->prepare("INSERT INTO services (service_name, service_description, service_icon, service_price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $service_name, $service_description, $service_icon, $service_price);
    if ($stmt->execute()) {
        $success = "Berhasil menambahkan data layanan";
    } else {
        $error = "Gagal menambahkan data layanan";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-service');
    exit();
}

if (isset($_POST['update-service'])) {
    $id = intval($_POST['id']);
    $service_name = ucwords(trim($_POST['service_name']));
    $service_description = $_POST['service_description'];
    $service_icon = $_POST['service_icon'];
    $service_price = floatval($_POST['service_price']);

    $stmt = $con->prepare("UPDATE services SET service_name = ?, service_description = ?, service_icon = ?, service_price = ? WHERE service_id = ?");
    $stmt->bind_param("sssdi", $service_name, $service_description, $service_icon, $service_price, $id);
    
    if ($stmt->execute()) {
        $success = "Data layanan berhasil diupdate";
    } else {
        $error = "Gagal mengupdate data layanan";
    }
    
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location: ../admin.php?data-service');
    exit();
}


if (isset($_POST['delete-service'])) {
    $id = intval($_POST['id']);
    $stmt = $con->prepare("DELETE FROM services WHERE service_id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $success = "Data layanan berhasil dihapus";
    } else {
        $error = "Data layanan gagal dihapus";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-service');
    exit();
}
?>
