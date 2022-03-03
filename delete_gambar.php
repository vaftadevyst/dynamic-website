<?php
if(isset($_GET['id_produk']))
{
    include('koneksi.php');
    $id_produk = $_GET['id_produk'];
    $query = mysqli_query($koneksi,"delete from produk where id_produk='$id_produk'");
}
header('location:main.php');
?>