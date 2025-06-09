<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_portofolio = mysqli_real_escape_string($koneksi, $_POST['id_portofolio']);
    $nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $waktu_kegiatan = mysqli_real_escape_string($koneksi, $_POST['waktu_kegiatan']);
    
    $cek = mysqli_query($koneksi, "SELECT * FROM tb_portofolio WHERE id_portofolio = '$id_portofolio'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: index.html?status=gagal&pesan=id_portofolio sudah terdaftar");
        exit();
    }
    
    $query = "INSERT INTO tb_portofolio (id_portofolio, nama_kegiatan, waktu_kegiatan) VALUES ('$id_portofolio', '$nama_kegiatan', '$waktu_kegiatan')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.html?status=sukses");
    } else {
        header("Location: index.html?status=gagal");
    }
} else {
    header("Location: index.html");
}
?>
