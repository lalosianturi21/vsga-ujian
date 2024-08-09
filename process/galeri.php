<?php 
session_start();
require '../config/conn.php';
require '../config/function.php';

if(isset($_POST['simpan-foto'])){
    $keterangan = ucwords($_POST['keterangan']);
    $wisata_id = $_POST['wisata_id'];

    $file       = $_FILES['file'];
    $filename    = $_FILES['file']['name'];
    $filetmp     = $_FILES['file']['tmp_name'];
    $filesize    = $_FILES['file']['size'];
    $filetype    = $_FILES['file']['type'];
    $fileext     = explode('.', $filename);
    $fileactext  = strtolower(end($fileext));
    $allowed    = array('jpg', 'png', 'jpeg');

    if (in_array($fileactext, $allowed)) {
        if ($filesize < 10240000) {
            $filenew =  "Galeri File-" . date('YmdHis') . "." . $fileactext;
            $filefolder = '../uploads/wisata/gallery/' . $filenew;
            move_uploaded_file($filetmp, $filefolder);

            $query = mysqli_query($con, "INSERT INTO wisata_galery (file,keterangan,wisata_id) VALUES ('$filenew','$keterangan','$wisata_id')") or die(mysqli_error($con));

            if ($query) {
                $success = "Berhasil menambahkan data galeri";
            } else {
                $error = "Gagal menambahkan data galeri";
            }
        } else {
            $error = "Ukuran file yang anda upload terlalu besar.";
        }
    } else {
        $error = "Format file yang anda upload tidak sesuai.";
    }

    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../admin.php?data-wisata-galeri');
}



if(isset($_POST['update-galeri'])){
    $id = $_POST['id'];
    $wisata_id = $_POST['wisata_id'];
    $keterangan = $_POST['keterangan'];
    $oldFile = $_POST['oldFile'];

    if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file'];
        $filename = $_FILES['file']['name'];
        $filetmp = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $filetype = $_FILES['file']['type'];
        $fileext = explode('.', $filename);
        $fileactext = strtolower(end($fileext));
        $allowed = array('jpg', 'png', 'jpeg');

        if (in_array($fileactext, $allowed)) {
            if ($filesize < 10485760) { // 10MB
                $filenew = $wisata_id . "-" . date('YmdHis') . "." . $fileactext;
                $filefolder = '../uploads/wisata/gallery/' . $filenew;
                move_uploaded_file($filetmp, $filefolder);

                if ($oldFile && file_exists('../uploads/wisata/gallery/' . $oldFile)) {
                    unlink('../uploads/wisata/gallery/' . $oldFile);
                }

                $query = mysqli_query($con, "UPDATE wisata_galery SET wisata_id='$wisata_id', file='$filenew', keterangan='$keterangan' WHERE idwisata_galery='$id'") or die(mysqli_error($con));

                if ($query) {
                    $success = "Berhasil memperbarui data galeri";
                } else {
                    $error = "Gagal memperbarui data galeri";
                }
            } else {
                $error = "Ukuran file yang anda upload terlalu besar.";
            }
        } else {
            $error = "Format file yang anda upload tidak sesuai.";
        }
    } else {
        $query = mysqli_query($con, "UPDATE wisata_galery SET wisata_id='$wisata_id', keterangan='$keterangan' WHERE idwisata_galery='$id'") or die(mysqli_error($con));

        if ($query) {
            $success = "Berhasil memperbarui data galeri";
        } else {
            $error = "Gagal memperbarui data galeri";
        }
    }

    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../admin.php?data-wisata-galeri');
}

if (isset($_POST['delete-galeri'])) {
    $id = $_POST['id'];
    $oldImage = $_POST['oldImage'];
    $delete = mysqli_query($con, "DELETE FROM wisata_galery WHERE idwisata_galery=$id");
    if ($delete) {
        if ($oldImage) {
            unlink('../uploads/wisata/gallery/' . $oldImage);
        }
        $success = "Data galeri berhasil dihapus";
    } else {
        $error = "Data galeri gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../admin.php?data-wisata-galeri');
}
?>