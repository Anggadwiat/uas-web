<?php
include 'koneksi.php';

if (isset($_GET['id_portofolio'])) {
    $id_portofolio = $_GET['id_portofolio'];
    
    $query = "DELETE FROM tb_portofolio WHERE id_portofolio = '$id_portofolio'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.html?status=sukses");
    } else {
        header("Location: index.html?status=gagal");
    }
} else {
    header("Location: index.html");
}
?>
