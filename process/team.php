<?php 
session_start();
require '../config/conn.php';
require '../config/function.php';

if (isset($_POST['simpan'])) {
    $team_name = ucwords($_POST['team_name']);
    $team_description = $_POST['team_description'];

    $file = $_FILES['cover'];
    $destination = '../uploads/wisata/team/';
    $filenew = uploadFile($file, $destination);

    if ($filenew) {
        // Fixed SQL syntax here: removed single quotes around 'linkyt'
        $stmt = $con->prepare("INSERT INTO team (team_name, team_description, cover) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $team_name, $team_description, $filenew); // Adjusted binding parameters
        if ($stmt->execute()) {
            $success = "Berhasil menambahkan data team";
        } else {
            $error = "Gagal menambahkan data team";
        }
        $stmt->close();
    } else {
        $error = $file ? "Ukuran file yang anda upload terlalu besar atau format tidak sesuai." : "File tidak diupload.";
    }

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-team');
    exit();
}

if (isset($_POST['update-team'])) {
    $id = intval($_POST['id']);
    $team_name = ucwords($_POST['team_name']);
    $team_description = $_POST['team_description'];
    $oldImage = $_POST['oldImage'];

    $file = $_FILES['cover'];
    if ($file['size'] > 0) {
        $destination = '../uploads/wisata/team/';
        $filenew = uploadFile($file, $destination);
        if ($filenew) {
            if ($oldImage) {
                unlink($destination . $oldImage);
            }
        } else {
            $error = "Ukuran file yang anda upload terlalu besar atau format tidak sesuai.";
        }
    } else {
        $filenew = $oldImage;
    }

    $stmt = $con->prepare("UPDATE team SET team_name = ?, team_description =?, cover = ? WHERE idteam = ?");
    $stmt->bind_param("sssi", $team_name, $team_description, $filenew, $id);
    if ($stmt->execute()) {
        $success = "Data team berhasil diupdate";
    } else {
        $error = "Gagal mengupdate data team";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-team');
    exit();
}

if (isset($_POST['delete-team'])) {
    $id = intval($_POST['id']);
    $oldImage = $_POST['oldImage'];
    $stmt = $con->prepare("DELETE FROM team WHERE idteam = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        if ($oldImage) {
            unlink('../uploads/wisata/team/' . $oldImage);
        }
        $success = "Data team berhasil dihapus";
    } else {
        $error = "Data team gagal dihapus";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-team');
    exit();
}

function uploadFile($file, $destination) {
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $filesize = $file['size'];
    $fileext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed = array('jpg', 'png', 'jpeg');

    if (in_array($fileext, $allowed) && $filesize < 2048000) {
        $filenew = uniqid('', true) . "." . $fileext;
        $filefolder = $destination . $filenew;
        move_uploaded_file($filetmp, $filefolder);
        return $filenew;
    } else {
        return false;
    }
}
?>
