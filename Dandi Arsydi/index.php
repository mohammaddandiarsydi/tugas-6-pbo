<?php
include 'koneksi.php';
include 'proses.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title >TUGAS PBO CRUD PHP & MY SQL </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <H1 class="text-center"> TUGAS PBO CRUD PHP & MY SQL </H1>
    <h5 class="text-center">Mutiara Vebriani (20051214014)</h5>
     
     <!-- FORM AWAL -->
    <div class="card mt-5">
      <div class="card-header bg-primary text-white">
        Form Input Data Mahasiswa Sistem Informasi 2020 B UNESA
      </div>
      <div class="card-body">
       <form method="post" action="" >
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="tnim" value="<?=@$vnim?>" class="form-control" placeholder="Masukan NIM" required="">
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Masukan Nama" required="">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="tjk">
            <option value="<?=@$vjk?>"><?=@$vjk?></option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan </option>
            </select>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea type="text" name="talm" class="form-control" placeholder="Masukan Alamat" required=""><?=@$valm?></textarea> 
        </div>

        <div class="form-group">
            <label>Kota</label>
            <input type="text" name="tkota" value="<?=@$vkot?>" class="form-control" placeholder="Masukan Kota" required="">
        </div>

            <div class="form-group" >
            <label>Email</label>
            <input type="text" name="tkeml" value="<?=@$veml?>" class="form-control" placeholder="Masukan Email" required="">
            <p> 
            </p>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="tfoto" value="<?=@$vfoto?>" required="" multiple >
            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p> 
        </div>
        

        <button type="Submit" class="btn btn-success" name="bsim" >Simpan</button>

        <button type="reset" class="btn btn-danger" name="bres">Kosongkan</button>

       </form>
      </div>
    </div>
    <!-- FORM AKHIR -->
 
<!-- TABEL AWAL -->
    <div class="card mt-5">
      <div class="card-header bg-success text-white">
        Data Mahasiswa Sistem Informasi 2020 B UNESA
      </div>
      <div class="card-body">
       <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

       <?php
            $no =1;
            $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id desc");
        while($data =mysqli_fetch_array ($tampil)) :
        ?>

        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nim']?></td>
            <td><?=$data['namamhs']?></td>
            <td><?=$data['jk']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['kota']?></td>
            <td><?=$data['email']?></td>
            <td><?=$data['foto']?></td>
            <td>
                <a href="index.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning"> Edit </a>
                <a href="index.php?hal=hapus&id=<?=$data['id']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
            </td>

        </tr>
       <?php endwhile;//penutup while?>

       </table>
      </div>
    </div>
    <!-- TABEL AKHIR -->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>