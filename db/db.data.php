<?php
include "../koneksi.php";
$aksi=$_GET['proses'];


if($aksi=="create"){
    $query = mysqli_query($koneksi, "SELECT MAX(iddata) AS max_id FROM data");
    $data = mysqli_fetch_assoc($query);
    $iddata = $data['max_id'] ? $data['max_id'] + 1 : 1;
    if ($iddata > 999) {
        echo "ID sudah mencapai batas maksimum 999.";
        exit;}

    $nama=$_POST['nama'];
    $gambar=$_POST['gambar'];
    $data=$_POST['data'];
    $idkategori=$_POST['idkategori'];
    
    $query="INSERT INTO data SET  iddata='$iddata',nama='$nama', gambar='$gambar', data='$data', idkategori='$idkategori'";
    $insert=mysqli_query($koneksi,$query);

    


}elseif($aksi=="edit"){
    $id=$_POST['iddata'];
   $nama=$_POST['nama'];
    $data=$_POST['data'];
    $idkategori=$_POST['idkategori'];
    // var_dump($nisn,$nama,$alamat);

    $query="UPDATE data SET nama='$nama', data='$data', idkategori='$idkategori'
    WHERE iddata='$id'";
    $update=mysqli_query($koneksi,$query);
}elseif($aksi=='hapus'){
    $id=$_GET['id'];

    $query="DELETE FROM data WHERE iddata='$id'";
    mysqli_query($koneksi,$query);
}
header("location:../index.php?title=dashboard&page=dashboard");

