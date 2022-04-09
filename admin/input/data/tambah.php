<?php
//include config.php
include "../../../config/connect.php";
//handle post
if(isset($_POST['submit'])){
    //ambil data dari form nama lengkap, tempat lahir, tanggal lahir, jenis kelamin, agama, jenjang pendidikan, tahun lulus, no hp, email, tinggi badan, berat badan, foto
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    //simpan foto ke folser
    move_uploaded_file($tmp, "../../../img/".$foto);
    //simpan data ke database
    $sql = "INSERT INTO pasien (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, jenjang_pendidikan, tahun_lulus, no_hp, email, tinggi_badan, berat_badan, foto) VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$jenjang_pendidikan', '$tahun_lulus', '$no_hp', '$email', '$tinggi_badan', '$berat_badan', '$foto')";
    //jalankan query
    $query = mysqli_query($connect, $sql);
    //jika query berhasil maka pesan success
    if($query){
        //pesan json success
        echo json_encode(array('status' => 'success'));
        //alihkan ke riwayat
        header("location:../../riwayat/index.php");
    }else{
        //pesan json error
        echo json_encode(array('status' => 'error', 'msg' => mysqli_error($connect)));
        //alihkan ke input
        header("location:../index.php");
    }
}