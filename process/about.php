<?php 
session_start();
require '../config/conn.php';
require '../config/function.php';

if (isset($_POST['simpan'])) {
    $about_name = ucwords($_POST['about_name']);
    $about_description = $_POST['about_description'];

    $file = $_FILES['cover'];
    $destination = '../uploads/wisata/about/';
    $filenew = uploadFile($file, $destination);

    if ($filenew) {
        // Fixed SQL syntax here: removed single quotes around 'linkyt'
        $stmt = $con->prepare("INSERT INTO about (about_name, about_description, cover) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $about_name, $about_description, $filenew); // Adjusted binding parameters
        if ($stmt->execute()) {
            $success = "Berhasil menambahkan data about";
        } else {
            $error = "Gagal menambahkan data about";
        }
        $stmt->close();
    } else {
        $error = $file ? "Ukuran file yang anda upload terlalu besar atau format tidak sesuai." : "File tidak diupload.";
    }

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-about');
    exit();
}

if (isset($_POST['update-about'])) {
    $id = intval($_POST['id']);
    $about_name = ucwords($_POST['about_name']);
    $about_description = $_POST['about_description'];
    $oldImage = $_POST['oldImage'];

    $file = $_FILES['cover'];
    if ($file['size'] > 0) {
        $destination = '../uploads/wisata/about/';
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

    $stmt = $con->prepare("UPDATE about SET about_name = ?, about_description =?, cover = ? WHERE idabout = ?");
    $stmt->bind_param("sssi", $about_name, $about_description, $filenew, $id);
    if ($stmt->execute()) {
        $success = "Data about berhasil diupdate";
    } else {
        $error = "Gagal mengupdate data about";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-about');
    exit();
}

if (isset($_POST['delete-about'])) {
    $id = intval($_POST['id']);
    $oldImage = $_POST['oldImage'];
    $stmt = $con->prepare("DELETE FROM about WHERE idabout = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        if ($oldImage) {
            unlink('../uploads/wisata/about/' . $oldImage);
        }
        $success = "Data about berhasil dihapus";
    } else {
        $error = "Data about gagal dihapus";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-about');
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
