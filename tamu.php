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
            max-width: 850px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            border: 1px solid #e0e0e0;
        }
        
        h2 {
            margin-top: 0;
            color: #00a4f0;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .menu-tamu {
            margin-bottom: 20px;
        }
        .btn-link {
            display: inline-block;
            text-decoration: none;
            background-color: #f8f9fa;
            color: #495057;
            padding: 8px 16px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-right: 10px;
        }
        .btn-link:hover {
            background-color: #00aeff;
            color: white;
            border-color: #00aeff;
        }

        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px;
            font-size: 15px;
        }
        th, td {
            padding: 12px 15px; 
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
        }
        tr:hover {
            background-color: #fdfdfd;
        }
        
        .pesan-kosong {
            text-align: center;
            padding: 30px;
            color: #6c757d;
            background-color: #f8f9fa;
            border-radius: 6px;
            border: 1px dashed #dee2e6;
            font-style: italic;
        }

        .action-btn {
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
        .edit-btn { color: #0288d1; }
        .edit-btn:hover { text-decoration: underline; }
        .hapus-btn { color: #d32f2f; }
        .hapus-btn:hover { text-decoration: underline; }

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
        <h2>Data Tamu</h2>
        
        <div class="menu-tamu">
            <a href="index.php" class="btn-link">← Kembali ke Home</a>
            <a href="tambahTamu.php" class="btn-link" style="background-color: #00a4f0; color: white; border-color: #00a4f0;">+ Tambah Tamu Baru</a>
        </div>

        <?php
        $query = "SELECT * FROM tamu";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No KTP</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th style='text-align: center;'>Aksi</th>
                  </tr>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><b>" . $row['id'] . "</b></td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['no_ktp']) . "</td>";
                echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                
                echo "<td style='text-align: center;'>
                        <a href='editTamu.php?id=" . $row['id'] . "' class='action-btn edit-btn'>Edit</a> | 
                        <a href='hapusTamu.php?id=" . $row['id'] . "' class='action-btn hapus-btn' onclick='return confirm(\"Apakah Anda yakin ingin menghapus tamu bernama " . htmlspecialchars($row['nama']) . "?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='pesan-kosong'>Belum ada data tamu di database.</div>";
        }
        ?>
    </div>

    <div style="height: 60px;"></div> 
    <footer><p>&copy; 2026 D3 RPLA Telkom University</p></footer>
</body>
</html>