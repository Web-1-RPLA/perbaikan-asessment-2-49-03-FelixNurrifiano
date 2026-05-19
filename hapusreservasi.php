<?php
include 'koneksi.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $cari_kamar = mysqli_query($conn, "SELECT id_kamar FROM reservasi WHERE id='$id'");
    $data_kamar = mysqli_fetch_assoc($cari_kamar);
    
    if ($data_kamar) {
        $id_kamar = $data_kamar['id_kamar'];
        mysqli_query($conn, "UPDATE kamar SET status='Tersedia' WHERE id='$id_kamar'");
    }

    $query = "DELETE FROM reservasi WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: reservasi.php");
        exit();
    } else {
        echo "Gagal menghapus transaksi reservasi: " . mysqli_error($conn);
    }
} else {
    header("Location: reservasi.php");
    exit();
}
?>