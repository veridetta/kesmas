<?php
//include config.php
include "../../../config/connect.php";
//handle post
if(isset($_POST['nama'])){
    //ambil data dari form nama lengkap, alamat, tempat tanggal lahir, jenis kelamin, agama,  no hp, email
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    //simpan data ke database
    $sql = "INSERT INTO karyawan VALUES('','$nama','$alamat','$tempat_tanggal_lahir','$jenis_kelamin','$agama','$no_hp','$email')";
    //jalankan query
    $query = mysqli_query($connect, $sql);
    //jika query berhasil maka pesan success
    if($query){
        //pesan json success
        echo json_encode(array('status' => 'success'));
        //alihkan ke riwayat
        header("location:../../riwayat/index.php?success=1");
    }else{
        //pesan json error
        echo json_encode(array('status' => 'error', 'msg' => mysqli_error($connect)));
        //alihkan ke input
        header("location:../../input/index.php?success=0");
    }
}