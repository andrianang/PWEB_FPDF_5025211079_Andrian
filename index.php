<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Siswa</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: center;
        padding: 10px;
    }

    th {
        background-color: #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        text-decoration: none;
        padding: 8px;
        border: 1px solid black;
        border-radius: 4px;
        float: left;
        margin-bottom:10px;
        margin-right:10px;
    }
    a:hover {
        background-color: gray;
        color: white;
    }
</style>
<body>
    <h1>Data Siswa</h1>
    <a href="form_simpan.php">Tambah Data</a>
    <a href="exportPDF.php">Export to PDF</a>
    <table style="border:1px; width:100%">
    <tr>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th colspan="2">Edit</th>
    </tr>     
    <?php
        include "koneksi.php";

        $sql = $pdo->prepare("SELECT * FROM siswa");
        $sql->execute();

        while($data = $sql->fetch()){
            echo "<tr>";
            echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
            echo "<td>".$data['nis']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['jenis_kelamin']."</td>";
            echo "<td>".$data['telp']."</td>";
            echo "<td>".$data['alamat']."</td>";
            echo "<td><a href='form_ubah.php?id=".$data['id']."'>Ubah</a></td>";
            echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
            echo "</tr>";
        }
    ?>
</table>
</body>

</html>