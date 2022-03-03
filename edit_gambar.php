<!DOCTYPE html>

<html>
    <head>
        <title>Form Anggota</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark text-white">
        
        <?php
            include_once("koneksi.php");
            $id_produk = $_GET['id_produk'];
            $katalog_data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk' ");
            
            while($row = mysqli_fetch_array($katalog_data)){ 
                $nama_produk = $row['nama_produk'];
                $keterangan = $row['keterangan'];
                $ukuran = $row['ukuran'];
                $harga = $row['harga'];
                $status = $row['status_produk'];
            }                
        ?>  
        <div class="container">
            <div class="row" style="margin: 50px;">
                <div class="col-md-1">
                    <a href="./main.php" class="btn btn-primary">Back</a> 
                </div>
                <div class="col-md-11 text-center">
                    <h4>EDIT PRODUK</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="edit_gambar.php?id_produk=<?php echo $id_produk; ?>" method="post" name="form1">
                        <table width=100% cellpadding="10" border="0">
                            <tr>
                                <td>ID Produk</td>
                                <td><input readonly="" type="text" class="form-control" name="id_produk" value="<?php echo $id_produk; ?>"></td>
                            </tr>
                            <tr>
                                <td>Nama Produk</td>
                                <td><input  type="text" class="form-control" name="nama_produk" value="<?php echo $nama_produk; ?>"></td>
                            </tr>
                            <tr>
                                <td>Ukuran</td>
                                <td><input  type="text" class="form-control" name="ukuran" value="<?php echo $ukuran; ?>"></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><input type="text" class="form-control" name="status_produk" value="<?php echo $status; ?>"></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><input type="text" class="form-control" name="keterangan" value="<?php echo $keterangan; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit" value="Edit" onclick="confirmation(<?php echo $id_produk; ?>)"></td>
                            </tr>
                            
                            
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    if (isset($_POST["submit"])){
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $keterangan = $_POST['keterangan'];
        $ukuran = $_POST['ukuran'];
        $harga = $_POST['harga'];
        $status = $_POST['status_produk'];

        $result = mysqli_query($koneksi, "UPDATE produk SET id_produk='$id_produk',nama_produk='$nama_produk',
        keterangan='$keterangan', ukuran='$ukuran', harga='$harga', status_produk='$status'
        WHERE id_produk='$id_produk';");
        
        header("Location:main.php");
    }
?>
<script type="text/javascript">
    function confirmation(id_produk) {
        if (confirm('Apakah anda yakin akan mengubah produk ini?')){
            window.location.href = 'edit_gambar.php?id_produk='+id_produk;
            window.location.replace("./main.php");

        }
    }

</script>