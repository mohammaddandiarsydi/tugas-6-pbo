<?php
include 'koneksi.php';
?>

<?php

//jika tombol simpan diklik
if(isset($_POST['bsim']))
{
    //pengujian simpan setelah edit
    if($_GET['hal'] == "edit") 
    {
        //data diedit
        $edit =  mysqli_query($koneksi,"UPDATE tmhs set 
                                            nim ='$_POST[tnim]',
                                            namamhs ='$_POST[tnama]',
                                            jk ='$_POST[tjk]',
                                            alamat ='$_POST[talm]',
                                            kota ='$_POST[tkota]',
                                            email ='$_POST[tkeml]',
                                            foto ='$_POST[tfoto]'
                                            WHERE id = '$_GET[id]'
                                            ");
        if($edit) 
        {
                    echo "<script>
            alert('Edit data sukses!');
            document.location='index.php';
                        </script>";
        }
        else 
        {
                    echo "<script>
            alert('Edit data gagal!');
            document.location='index.php';
                        </script>";
        } 
    }
    else
    {
        $simpan =  mysqli_query($koneksi, "INSERT INTO tmhs(nim,namamhs,jk,alamat,kota,email,foto)
                            VALUES ('$_POST[tnim]',
                                   '$_POST[tnama]',
                                   '$_POST[tjk]',
                                   '$_POST[talm]',
                                   '$_POST[tkota]',
                                   '$_POST[tkeml]',
                                   '$_POST[tfoto]')

                            ");
            if($simpan) 
            {
                echo "<script>
        alert('Simpan data sukses!');
        document.location='index.php';
                    </script>";
            }
            else 
            {
                echo "<script>
        alert('Simpan data gagal!');
        document.location='index.php';
                    </script>";
            }
    }

}

    //pengujian edit
    if(isset($_GET['hal']))
    {
        //pengujian
        if($_GET['hal'] == "edit")
        {
            //tampil data
            $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_assoc($tampil);
            if ($data) 
            {
                //penampungan data
                $vnim = $data['nim'];
                $vnama = $data['namamhs'];
                $vjk = $data['jk'];
                $valm = $data['alamat'];
                $vkot = $data['kota'];
                $veml = $data['email'];
                $vfoto = $data['foto'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
//persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id = '$_GET[id]' ");
            if($hapus) {
                echo "<script>
        alert('Hapus data sukses!');
        document.location='index.php';
                    </script>";
            }
        }
    }
?>