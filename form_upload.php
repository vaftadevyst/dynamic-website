
<!DOCTYPE html>

<html>
    <head>
        <title>Form Upload</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
   
    </head>
    <body class="bg-dark text-white">  
        <div class="container">
            <div class="row" style="margin: 50px;">
                <div class="col-md-1">
                    <a href="./main.php" class="btn btn-primary">Back</a> 
                </div>
                <div class="col-md-11 text-center"> 
                    <h4>Form Upload</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="" enctype="multipart/form-data">
                    <table width=100% cellpadding="10" border="0">
                        <tr>
                          
                            <td><label for="formFile" class="form-label">Gambar</label></td>
                            <td><input class="form-control" type="file" class="form-control" id="formFile" name="gambar"/></td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td><input class="form-control" type="text" name="nama_produk"></input></td>
                        </tr>
                        <tr>
                            <td>Ukuran</td>
                            <td><input class="form-control" type="text" name="ukuran"></input></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><input class="form-control" type="text" name="harga"></input></td>
                        </tr>
                        
                        <tr>
                            <td>Status</td>
                            <td><input class="form-control" type="text" name="status_produk"></input></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><input class="form-control" type="text" name="keterangan"></input></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" name="tombol" class="form-control btn btn-primary" onclick="confirmation()"/></td>
                        </tr>
                    </table>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
<?php 
include('koneksi.php');
if(isset($_POST['tombol']))
{
    if(!isset($_FILES['gambar']['tmp_name'])){
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    }
    else
    {
        $file_name = $_FILES['gambar']['name'];
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
        {
            $image   = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            $nama_produk = $_POST['nama_produk'];
            $keterangan = $_POST['keterangan'];
            $ukuran = $_POST['ukuran'];
            $harga = $_POST['harga'];
            $status = $_POST['status_produk'];

            mysqli_query($koneksi,"insert into produk (gambar,nama_gambar,tipe_gambar,ukuran_gambar,nama_produk,keterangan,ukuran,harga,status_produk) values ('$image','$file_name','$file_type','$file_size','$nama_produk','$keterangan','$ukuran','$harga','$status');");
            header("location:main.php");
        }
        else
        {
            echo '<span style="color:red"><b><u><i>Ukuran File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }
}
?>
<script type="text/javascript">
    function confirmation() {
        if (confirm('Apakah anda yakin akan menambahkan produk ini kedalam katalog?')){
            window.location.href = 'form_upload.php';
        }
    }

</script>


