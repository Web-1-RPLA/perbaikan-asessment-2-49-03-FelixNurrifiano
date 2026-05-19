<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_tamu = mysqli_real_escape_string($conn, $_POST['id_tamu']);
    $id_kamar = mysqli_real_escape_string($conn, $_POST['id_kamar']);
    $tanggal_checkin = mysqli_real_escape_string($conn, $_POST['tanggal_checkin']);
    $tanggal_checkout = mysqli_real_escape_string($conn, $_POST['tanggal_checkout']);

    $query = "INSERT INTO reservasi (id_tamu, id_kamar, tanggal_checkin, tanggal_checkout, status) 
              VALUES ('$id_tamu', '$id_kamar', '$tanggal_checkin', '$tanggal_checkout', 'Aktif')";

    if (mysqli_query($conn, $query)) {
        mysqli_query($conn, "UPDATE kamar SET status='Terisi' WHERE id='$id_kamar'");
        header("Location: reservasi.php");
        exit();
    } else {
        echo "Gagal menyimpan data reservasi: " . mysqli_error($conn);
    }
} else {
    header("Location: tambahreservasi.php");
    exit();
}
?>