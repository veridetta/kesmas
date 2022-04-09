<?php
//Membuat Halaman Pendaftaran Karyawan
//include config/connect.php
include "config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- judul -->
    <title>Pendaftaran Karyawan</title>
    <?php
    //include file assets/.php
    include "include/assets.php";
    ?>
</head>
<body>
    <div class="container col-12" style="width:100%;">
        <!-- judul Pendaftaran Karyawan -->
        <!-- div padding top bottom 20px-->
        <div class="row bg-primary " style="min-height:40vh;padding:0px;">
            <div class="col-12  my-auto" style="padding-top:20px;padding-bottom: 20px;">
                <!-- center vertical bootstrap-->
                <div class="text-center my-auto">
                    <h1 class="text-white">Halaman Pendaftaran Karyawan</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="padding: 12px;">
                <!-- if get success=1 maka tampilkan pesan berhasil -->
                <?php if(isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> Data berhasil ditambahkan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                //jika sukses=0 maka tampilkan pesan gagal
                elseif(isset($_GET['sukses'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> Data gagal ditambahkan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!--card bootstrap-->
                <!-- Membuat form input data karyawan nama lengkap, alamat, tempat tanggal lahir, jenis kelamin, agama,  no hp, email-->
                <div class="card">
                    <div class="card-header">
                        <h3>Form Pendaftaran Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <form action="admin/input/data/tambah.php" method="post">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                            </div>
                            <!-- tempat tanggal lahir-->
                            <div class="form-group">
                                <label for="tempat_tanggal_lahir">Tempat Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tempat_tanggal_lahir" id="tempat_tanggal_lahir" placeholder="Masukkan Tempat Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No Hp">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                            </div>
                            <!-- submit button-->
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
<?php
include 'include/footer.php';
?>
</html>




    
