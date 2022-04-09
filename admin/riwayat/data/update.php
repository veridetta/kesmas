<?php

//update data pasien
//include file connect.php
include "../../../config/connect.php";
//type json
header('Content-Type: application/json');
//cek POST
if (isset($_POST['nama'])) {
    //cek validasi
    //cek validasi nama lengkap, tempat lahir, tanggal lahir, jenis kelamin, agama, jenjang pendidikan, tahun lulus, no hp, email, tinggi badan, berat badan
    if(empty($_POST['nama'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'nama tidak boleh kosong'));
    }else{
        $nama_lengkap=$_POST['nama'];
    }
    if(empty($_POST['tempat_lahir'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'tempat lahir tidak boleh kosong'));
    }else{
        $tempat_lahir=$_POST['tempat_lahir'];
    }
    if(empty($_POST['tanggal_lahir'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'tanggal lahir tidak boleh kosong'));
    }else{
        $tanggal_lahir=$_POST['tanggal_lahir'];
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
    if(empty($_POST['jenjang_pendidikan'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'jenjang pendidikan tidak boleh kosong'));
    }else{
        $jenjang_pendidikan=$_POST['jenjang_pendidikan'];
    }
    if(empty($_POST['tahun_lulus'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'tahun lulus tidak boleh kosong'));
    }else{
        $tahun_lulus=$_POST['tahun_lulus'];
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
    if(empty($_POST['tinggi_badan'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'tinggi badan tidak boleh kosong'));
    }else{
        $tinggi_badan=$_POST['tinggi_badan'];
    }
    if(empty($_POST['berat_badan'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'berat badan tidak boleh kosong'));
    }else{
        $berat_badan=$_POST['berat_badan'];
    }
    if(empty($_POST['id'])){
        //jika kode_prodi kosong
        echo json_encode(array('status'=>'failed', 'message'=>'Id tidak boleh kosong'));
    }else{
        $id=$_POST['id'];
    }
    if (empty($error)) {
        //update table pasien
        $sql = "UPDATE pasien SET nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', jenjang_pendidikan='$jenjang_pendidikan', tahun_lulus='$tahun_lulus', no_hp='$no_hp', email='$email', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan' WHERE id='$id'";
        
        $query = mysqli_query($connect, $sql);

        if ($query) {
            echo json_encode(array('status'=>'success'));
        } else {
             //jika gagal json
            echo json_encode(array('status'=>'failed', 
            //menampilkan log error
            'error'=>mysqli_error($connect)));
        }
    }
}
