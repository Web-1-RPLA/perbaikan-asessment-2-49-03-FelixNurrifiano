<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: kamar.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM kamar WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: kamar.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> 4903 607062500001 Felix Rifiano </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif; 
            background-color: #f4f7f6; 
            margin: 0; 
            padding: 0;
            color: #333;
        }
        header {background-color: #00a4f0; color: white; padding: 25px 0; text-align:center;}
        nav {background-color: #00aeff; overflow:hidden;}
        nav a {float:left; display:block; color:white; padding:14px 20px; text-decoration:none; font-weight: 500;}
        nav a:hover {background-color:#ddd; color:black;}
        
        .content {
            margin: 40px auto; 
            padding: 30px; 
            max-width: 450px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            border: 1px solid #e0e0e0;
        }
        
        h3 {
            margin-top: 0;
            color: #00a4f0;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 14px;
            color: #495057;
        }
        .form-group input[type="text"], .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-group input[type="text"]:focus, .form-group select:focus {
            border-color: #00aeff;
            outline: none;
        }

        .btn-container {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }
        .btn-submit {
            background-color: #00a4f0;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: background-color 0.2s;
        }
        .btn-submit:hover {
            background-color: #00aeff;
        }
        .btn-cancel {
            margin-left: 15px;
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-cancel:hover {
            text-decoration: underline;
        }

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
        <h3>Edit Data Kamar</h3>
        <form action="proseseditkamar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class="form-group">
                <label>Nomor Kamar</label>
                <input type="text" name="nomor_kamar" value="<?php echo htmlspecialchars($data['nomor_kamar']); ?>" required>
            </div>
            <div class="form-group">
                <label>Tipe Kamar</label>
                <select name="tipe_kamar" required>
                    <option value="Single" <?php if($data['tipe_kamar'] == 'Single') echo 'selected'; ?>>Single</option>
                    <option value="Double" <?php if($data['tipe_kamar'] == 'Double') echo 'selected'; ?>>Double</option>
                    <option value="Suite" <?php if($data['tipe_kamar'] == 'Suite') echo 'selected'; ?>>Suite</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga per Malam</label>
                <input type="text" name="harga_per_malam" value="<?php echo htmlspecialchars($data['harga_per_malam']); ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" required>
                    <option value="Tersedia" <?php if($data['status'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                    <option value="Terisi" <?php if($data['status'] == 'Terisi') echo 'selected'; ?>>Terisi</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" name="update" class="btn-submit">Update Kamar</button>
                <a href="kamar.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>

    <div style="height: 60px;"></div>
    <footer><p>&copy; 2026 D3 RPLA Telkom University</p></footer>
</body>
</html>