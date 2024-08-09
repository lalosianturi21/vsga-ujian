<?php 
session_start();
require '../config/conn.php';
require '../config/function.php';

if (isset($_POST['simpan'])) {
    $nama = ucwords($_POST['nama']);
    $alamat = $_POST['alamat'];
    $linkyt = $_POST['linkyt'];
    $no_wa = $_POST['no_wa'];
    $harga = delMask($_POST['harga']);

    $file = $_FILES['cover'];
    $destination = '../uploads/wisata/cover/';
    $filenew = uploadFile($file, $destination);

    if ($filenew) {
        // Fixed SQL syntax here: removed single quotes around 'linkyt'
        $stmt = $con->prepare("INSERT INTO wisata (nama, alamat, linkyt, no_wa, harga, cover) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nama, $alamat, $linkyt, $no_wa, $harga, $filenew); // Adjusted binding parameters
        if ($stmt->execute()) {
            $success = "Berhasil menambahkan data wisata";
        } else {
            $error = "Gagal menambahkan data wisata";
        }
        $stmt->close();
    } else {
        $error = $file ? "Ukuran file yang anda upload terlalu besar atau format tidak sesuai." : "File tidak diupload.";
    }

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-wisata');
    exit();
}

if (isset($_POST['update-wisata'])) {
    $id = intval($_POST['id']);
    $nama = ucwords($_POST['nama']);
    $alamat = $_POST['alamat'];
    $linkyt = $_POST['linkyt'];
    $no_wa = $_POST['no_wa'];
    $harga = delMask($_POST['harga']);
    $oldImage = $_POST['oldImage'];

    $file = $_FILES['cover'];
    if ($file['size'] > 0) {
        $destination = '../uploads/wisata/cover/';
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

    $stmt = $con->prepare("UPDATE wisata SET nama = ?, alamat = ?, linkyt = ?, no_wa = ?, harga = ?, cover = ? WHERE idwisata = ?");
    $stmt->bind_param("ssssssi", $nama, $alamat, $linkyt, $no_wa, $harga, $filenew, $id);
    if ($stmt->execute()) {
        $success = "Data wisata berhasil diupdate";
    } else {
        $error = "Gagal mengupdate data wisata";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-wisata');
    exit();
}

if (isset($_POST['delete-wisata'])) {
    $id = intval($_POST['id']);
    $oldImage = $_POST['oldImage'];
    $stmt = $con->prepare("DELETE FROM wisata WHERE idwisata = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        if ($oldImage) {
            unlink('../uploads/wisata/cover/' . $oldImage);
        }
        $success = "Data wisata berhasil dihapus";
    } else {
        $error = "Data wisata gagal dihapus";
    }
    $stmt->close();

    $_SESSION['success'] = $success ?? null;
    $_SESSION['error'] = $error ?? null;
    header('Location:../admin.php?data-wisata');
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
