<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <?php
    include "koneksi.php";
    
    $id = $_GET['id'];
    
    $sql = $pdo->prepare("SELECT * FROM Siswa WHERE id = :id");
    $sql->bindParam(':id', $id);
    
    $sql->execute();
    
    $data = $sql->fetch();
    ?>
    <div class="container">
        <h1>Ubah Data Siswa</h1>
        <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <table cellpadding="8">
        <tr>
            <td>NIS</td>
            <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
            <?php
            if($data['jenis_kelamin'] == "Laki-laki"){
            echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'> Laki-laki";
            echo "<input type='radio' name='jenis_kelamin' value='perempuan'> Perempuan";
            }else{
            echo "<input type='radio' name='jenis_kelamin' value='laki-laki'> Laki-laki";
            echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'> Perempuan";
            }
            ?>
            </td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>
            <input type="file" name="foto">
            </td>
        </tr>
        </table>
        <hr>
        <div class="but">
            <input type="submit" value="Ubah">
            <a href="index.php"><input type="button" value="Batal"></a>
        </div>
    </form>
    </div>
</body>

</html>