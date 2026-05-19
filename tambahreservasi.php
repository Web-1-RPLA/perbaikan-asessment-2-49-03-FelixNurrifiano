<?php
include 'koneksi.php';
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
        .form-group input[type="date"], .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-group select:focus, .form-group input[type="date"]:focus {
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
        <h3>Tambah Reservasi Baru</h3>
        <form action="prosesreservasi.php" method="POST">
            
            <div class="form-group">
                <label>Pilih Tamu</label>
                <select name="id_tamu" required>
                    <?php
                    $res_tamu = mysqli_query($conn, "SELECT id, nama FROM tamu");
                    while($tamu = mysqli_fetch_assoc($res_tamu)) {
                        echo "<option value='".$tamu['id']."'>".$tamu['nama']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Pilih Kamar (Hanya yang Tersedia)</label>
                <select name="id_kamar" required>
                    <?php
                    $res_kamar = mysqli_query($conn, "SELECT id, nomor_kamar, tipe_kamar FROM kamar WHERE status='Tersedia'");
                    while($kamar = mysqli_fetch_assoc($res_kamar)) {
                        echo "<option value='".$kamar['id']."'>Kamar ".$kamar['nomor_kamar']." (".$kamar['tipe_kamar'].")</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Check-In</label>
                <input type="date" name="tanggal_checkin" required>
            </div>

            <div class="form-group">
                <label>Tanggal Check-Out</label>
                <input type="date" name="tanggal_checkout" required>
            </div>

            <div class="btn-container">
                <button type="submit" name="submit" class="btn-submit">Simpan Reservasi</button>
                <a href="reservasi.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>

    <div style="height: 60px;"></div>
    <footer><p>&copy; 2026 D3 RPLA Telkom University</p></footer>
</body>
</html>