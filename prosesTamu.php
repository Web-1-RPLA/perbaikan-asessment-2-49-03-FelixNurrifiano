<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
    $no_ktp = mysqli_real_escape_string($conn, $_POST['no_ktp']);
    $no_hp  = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $query = "INSERT INTO tamu (nama, no_ktp, no_hp, alamat) VALUES ('$nama', '$no_ktp', '$no_hp', '$alamat')";

    if (mysqli_query($conn, $query)) {
        header("Location: tamu.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
} else {
    header("Location: tambahTamu.php");
    exit();
}
?>