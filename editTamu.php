<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: tamu.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM tamu WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tamu tidak ditemukan di database.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> 4903 607062500001 Felix Rifiano </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {font-family: Arial, sans-serif; background-color: #ffffff; margin:0; padding:0;}
        header {background-color: #00a4f0; color: white; padding: 25px 0; text-align:center;}
        nav {background-color: #00aeff; overflow:hidden;}
        nav a {float:left; display:block; color:white; padding:14px 20px; text-decoration:none;}
        nav a:hover {background-color:#ddd; color:black;}
        .content {margin: 40px auto; padding:20px; max-width: 400px;}
        .form-group {margin-bottom: 12px;}
        .form-group label {display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px;}
        .form-group input[type="text"] {width: 100%; padding: 6px; box-sizing: border-box; border: 1px solid #aaa;}
        .btn-container {margin-top: 15px;}
        .btn-container button {padding: 6px 12px; background-color: #f0f0f0; border: 1px solid #777; cursor: pointer;}
        .btn-container a {margin-left: 10px; color: blue; text-decoration: underline; font-size: 14px;}
        footer {background-color:#343a40; color:white; padding:12px; text-align:center; position:fixed; bottom:0; width:100%;}
    </style>
</head>
<body>
    <header><h1>Hotel D3 RPLA Telkom University</h1></header>
    <nav>
        <a href="tamu.php">Tamu</a>
        <a href="kamar.php">Kamar</a>
        <a href="reservasi.php">Reservasi</a>
    </nav>

    <div class="content">
        <div style="border: 1px solid #000; padding: 20px; background-color: #fff;">
            <h3 style="margin-top: 0;">Edit Data Tamu</h3>
            <form action="prosesEditTamu.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label>No KTP</label>
                    <input type="text" name="no_ktp" value="<?php echo $data['no_ktp']; ?>" required>
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                </div>
                <div class="btn-container">
                    <button type="submit" name="update">Update Tamu</button>
                    <a href="tamu.php">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <footer><p>&copy; 2026 D3 RPLA Telkom University</p></footer>
</body>
</html>