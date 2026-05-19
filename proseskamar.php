<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nomor_kamar = mysqli_real_escape_string($conn, $_POST['nomor_kamar']);
    $tipe_kamar = mysqli_real_escape_string($conn, $_POST['tipe_kamar']);
    $harga_per_malam = mysqli_real_escape_string($conn, $_POST['harga_per_malam']);

    $query = "INSERT INTO kamar (nomor_kamar, tipe_kamar, harga_per_malam, status) VALUES ('$nomor_kamar', '$tipe_kamar', '$harga_per_malam', 'Tersedia')";

    if (mysqli_query($conn, $query)) {
        header("Location: kamar.php");
        exit();
    } else {
        die("<b style='color:red;'>Gagal menyimpan data ke database. Detail Error SQL: </b>" . mysqli_error($conn));
    }
} else {
    header("Location: tambahkamar.php");
    exit();
}
?>