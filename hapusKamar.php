<?php
include 'koneksi.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM kamar WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: kamar.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    header("Location: kamar.php");
    exit();
}
?>