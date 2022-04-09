<?php

//update data karyawan
//include file connect.php
include "../../../config/connect.php";
//type json
header('Content-Type: application/json');
//cek POST
if (isset($_POST['nama'])) {
    //cek validasi
    //cek validasi nama lengkap, alamat, tempat tanggal lahir, jenis kelamin, agama,  no hp, email
    if(empty($_POST['nama'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'nama tidak boleh kosong'));
    }else{
        $nama_lengkap=$_POST['nama'];
    }
    //alamat
    if(empty($_POST['alamat'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'alamat tidak boleh kosong'));
    }else{
        $alamat=$_POST['alamat'];
    }
    if(empty($_POST['tempat_tanggal_lahir'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'tempat tanggal lahir tidak boleh kosong'));
    }else{
        $tempat_tanggal_lahir=$_POST['tempat_tanggal_lahir'];
    }
    if(empty($_POST['jenis_kelamin'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'jenis kelamin tidak boleh kosong'));
    }else{
        $jenis_kelamin=$_POST['jenis_kelamin'];
    }
    if(empty($_POST['agama'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'agama tidak boleh kosong'));
    }else{
        $agama=$_POST['agama'];
    }
    if(empty($_POST['no_hp'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'no hp tidak boleh kosong'));
    }else{
        $no_hp=$_POST['no_hp'];
    }
    if(empty($_POST['email'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'email tidak boleh kosong'));
    }else{
        $email=$_POST['email'];
    }
    if(empty($_POST['id'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'Id tidak boleh kosong'));
    }else{
        $id=$_POST['id'];
    }
    if (empty($error)) {
        //update table karyawan
        $query = "UPDATE karyawan SET nama_lengkap='$nama_lengkap', alamat='$alamat', tempat_tanggal_lahir='$tempat_tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', no_hp='$no_hp', email='$email' WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        if (mysqli_affected_rows($connect)==1) {
            echo json_encode(array('status'=>'success'));
        } else {
             //jika gagal json
            echo json_encode(array('status'=>'failed', 
            //menampilkan log error
            'error'=>mysqli_error($connect)));
        }
    }
}
