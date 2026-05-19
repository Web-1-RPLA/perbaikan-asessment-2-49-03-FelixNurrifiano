<?php
include 'koneksi.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM tamu WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: tamu.php");
        exit();
    } else {
        echo "Gagal menghapus data! Hubungan Foreign Key mendeteksi data tamu ini masih digunakan pada transaksi di tabel reservasi. Hapus data reservasinya terlebih dahulu.";
    }
} else {
    header("Location: tamu.php");
    exit();
}
?>