<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id     = mysqli_real_escape_string($conn, $_POST['id']);
    $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
    $no_ktp = mysqli_real_escape_string($conn, $_POST['no_ktp']);
    $no_hp  = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $query = "UPDATE tamu SET nama='$nama', no_ktp='$no_ktp', no_hp='$no_hp', alamat='$alamat' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: tamu.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
} else {
    header("Location: tamu.php");
    exit();
}
?>