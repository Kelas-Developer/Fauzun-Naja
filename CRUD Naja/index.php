<?php
  include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Home</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }
        h1 {
            text-transform: uppercase;
            color: salmon;
        }
        table {
            border: solud 1px;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }
        table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
        }
        table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
        }
        a {
        background-color: salmon;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
        }
    </style>
</head>
<body>
    <center><h1>Data Produk</h1></center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM produk ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            if(!$result) {
                die ("Query Error: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
            }
            $no = 1;
            while($row = mysqli_fetch_assoc($result))
            {
           ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama_produk']; ?></td>
            <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
            <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
            <td>Rp <?php echo $row['harga_jual']; ?></td>
            <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk'];  ?>" style="width: 120px"></td>
            <td>
                <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return_confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
        $no++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>