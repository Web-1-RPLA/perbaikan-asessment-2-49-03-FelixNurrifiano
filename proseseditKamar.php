<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nomor_kamar = mysqli_real_escape_string($conn, $_POST['nomor_kamar']);
    $tipe_kamar = mysqli_real_escape_string($conn, $_POST['tipe_kamar']);
    $harga_per_malam = mysqli_real_escape_string($conn, $_POST['harga_per_malam']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE kamar SET nomor_kamar='$nomor_kamar', tipe_kamar='$tipe_kamar', harga_per_malam='$harga_per_malam', status='$status' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: kamar.php");
        exit();
    } else {
        echo "Gagal memperbarui data kamar: " . mysqli_error($conn);
    }
} else {
    header("Location: kamar.php");
    exit();
}
?>