<?php
//include config/connect.php
include "../../config/connect.php";
//include file header.php
include "../../include/header.php";
//membuat variable kosong
$username = "";
$password = "";
$nama = "";
$level = "";
//include session_checker.php
include "../../include/session_checker.php";
//panggil fungsi session
session_checker();
//cek jika sudah ada session
if(isset($_SESSION['username'])){
    //jika sudah ada session maka akan menjalankan perintah dibawah
    //mengambil data dari session
    $username = $_SESSION['username'];
    //mengambil data dari database
    $sql = "SELECT * FROM user WHERE username='$username'";
    //menjalankan query
    $query = mysqli_query($connect, $sql);
    //menghitung jumlah data yang ditemukan
    $count = mysqli_num_rows($query);
    //jika data yang ditemukan sama dengan 1
    if($count == 1){
        //maka akan menjalankan perintah dibawah
        //mengambil data dari database
        $data = mysqli_fetch_assoc($query);
        //mengambil data dari database
        $level = $data['level'];
        //jika level sama dengan admin
        if($level == "admin"){
            //maka akan menjalankan perintah dibawah
            //mengambil data dari database
            $id = $data['id'];
            //mengambil data dari database
            $username = $data['username'];
            //mengambil data dari database
            $password = $data['password'];
            //mengambil data dari database
            $level = $data['level'];
            //mengambil data dari database
            $nama = $data['nama'];
        }
        //jika level sama dengan user
        else if($level == "user"){
            //maka akan dialihkan ke halaman user
            header("location:../user/index.php");
        }
    }
}
//membuat halaman admin Kesmas dengan bootsrap dan jquery cdn online
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pasien</title>
    <?php
    //include file assets/.php
    include "../../include/assets.php";
    ?>
</head>
<body>
    <div class="container col-11" style="padding: 12px;">
        <div class="row">
            <!-- menampilkan data pasien menggunakan boostrap datatables server side -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 table-responsive">
                            <table id="tb_pasien" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <!-- tempat lahir-->    
                                        <th>Tempat Lahir</th>
                                        <!-- tanggal lahir-->
                                        <th>Tanggal Lahir</th>
                                        <!-- jenis kelamin-->
                                        <th>Jenis Kelamin</th>
                                        <!-- agama -->
                                        <th>Agama</th>
                                        <!-- jenjang pendidikan -->
                                        <th>Jenjang Pendidikan</th>
                                        <!-- tahun lulus -->
                                        <th>Tahun Lulus</th>
                                        <!-- no hp -->
                                        <th>No HP</th>
                                        <!-- email -->
                                        <th>Email</th>
                                        <!-- tinggi badan -->
                                        <th>Tinggi Badan</th>
                                        <!-- berat badan -->
                                        <th>Berat Badan</th>
                                        <!-- foto -->
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- membuat modal untuk ubah data pasien-->
<div class="modal fade" id="modal_ubah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_ubah" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" class="form-control" id="id" name="id" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" id="agama" name="agama">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                <select class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan">
                                    <option value="">Pilih Jenjang Pendidikan</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tahun_lulus">Tahun Lulus</label>
                                <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tinggi_badan">Tinggi Badan</label>
                                <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="berat_badan">Berat Badan</label>
                                <input type="text" class="form-control" id="berat_badan" name="berat_badan">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn_submit_ubah">Ubah</button>
            </div>
        </div>
    </div>
</div>            
<script>
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';
        //datatables with server side processing
        $('#tb_pasien').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "data/get.php",
                "data":function(d){
                    
                }
            },
            //tambah tombol hapus dan edit dengan fungsi
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                var index = iDisplayIndex +1;
                $('td:eq(0)',nRow).html(index);
                $('td:eq(14)',nRow).html(`
                    <a href="../show/index.php?id=${aData[1]}" class="btn btn-primary btn-sm btn_show" style='margin-bottom:2px;'>Lihat</a>
                    <a href="edit.php?id=${aData[1]}" class="btn btn-warning btn-sm editUser" data-toggle='modal' data-target='#modal_ubah' style='margin-bottom:2px;'>Edit</a>
                    <a href="#" id="${aData[1]}" class="btn btn-danger btn-sm btn_hapus" >Hapus</a>
                `);
                //set id iinput
                $('#id').val(aData[1]);
                $('#nama').val(aData[2]);
                $('#tempat_lahir').val(aData[3]);
                $('#tanggal_lahir').val(aData[4]);
                $('#jenis_kelamin').val(aData[5]);
                $('#agama').val(aData[6]);
                $('#jenjang_pendidikan').val(aData[7]);
                $('#tahun_lulus').val(aData[8]);
                $('#no_hp').val(aData[9]);
                $('#email').val(aData[10]);
                $('#tinggi_badan').val(aData[11]);
                $('#berat_badan').val(aData[12]);
                
                return nRow;
            },
            //menambahkan tombol visibility, copy, csv, excel, pdf, print
            columnDefs: [
                {
                    targets: [0,14],
                    className: 'text-center'
                }
            ],
            //set column yang dapat di sort
            "columns": [
                {"orderable": false},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": true},
                {"orderable": false}

            ],
            //menambahkan urut
            order: [[ 0, "asc" ]],
            //menambahkan tombol cetek
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i>',
                    className: 'btn btn-info'
                },
                {
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv"></i>',
                    className: 'btn btn-info'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i>',
                    className: 'btn btn-info'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i>',
                    className: 'btn btn-info'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i>',
                    className: 'btn btn-info'
                }
            ],
            //btn editUser click
            "fnDrawCallback": function() {
                $('.editUser').click(function() {
                    var id = $(this).attr('id');
                   // get value row
                   var dtrow = $(this).closest('tr');
                   //var id
                     var ids= dtrow.find('td:eq(1)').text();
                        var nama= dtrow.find('td:eq(2)').text();
                        var tempat_lahir= dtrow.find('td:eq(3)').text();
                        var tanggal_lahir= dtrow.find('td:eq(4)').text();
                        var jenis_kelamin= dtrow.find('td:eq(5)').text();
                        var agama= dtrow.find('td:eq(6)').text();
                        var jenjang_pendidikan= dtrow.find('td:eq(7)').text();
                        var tahun_lulus= dtrow.find('td:eq(8)').text();
                        var no_hp= dtrow.find('td:eq(9)').text();
                        var email= dtrow.find('td:eq(10)').text();
                        var tinggi_badan= dtrow.find('td:eq(11)').text();
                        var berat_badan= dtrow.find('td:eq(12)').text();
                        //set value
                        $('#id').val(ids);
                        $('#nama').val(nama);
                        $('#tempat_lahir').val(tempat_lahir);
                        $('#tanggal_lahir').val(tanggal_lahir);
                        $('#jenis_kelamin').val(jenis_kelamin);
                        $('#agama').val(agama);
                        $('#jenjang_pendidikan').val(jenjang_pendidikan);
                        $('#tahun_lulus').val(tahun_lulus);
                        $('#no_hp').val(no_hp);
                        $('#email').val(email);
                        $('#tinggi_badan').val(tinggi_badan);
                        $('#berat_badan').val(berat_badan);
                    //ubah tipe ke edit
                    $('#tipe').val('edit');

                });
                //hapus data
                $('.btn_hapus').click(function() {
                    var id = $(this).attr('id');
                    var dtrow = $(this).closest('tr');
                    var ids= dtrow.find('td:eq(1)').text();
                    //swal confirm hapus
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            //ajax
                            $.ajax({
                                url: 'data/hapus.php',
                                type: 'POST',
                                data: {
                                    id: $(this).attr('id')
                                },
                                success: function(data) {
                                    //jika data.status = success
                                    if (data.status == 'success') {
                                        swal("Data berhasil dihapus!", {
                                            icon: "success",
                                        });
                                        //refresh table
                                        $('#table_dosen').DataTable().ajax.reload();
                                    } else {
                                        swal("Data gagal dihapus!", {
                                            icon: "error",
                                            msg: data.error
                                        });
                                    }
                                }
                            });
                        }
                    });
                });
            }

        });
        //btn_submit_ubah klik form_ubah submit
        $('#btn_submit_ubah').click(function() {
            //submit form_ubah
            $('#form_ubah').submit();
        });
        //form update click ajax
        $('#form_ubah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data/update.php',
                type: 'POST',
                data: $('#form_ubah').serialize(),
                success: function(data) {
                    //close modal
                    $('#modal_ubah').modal('hide');
                    //if data.status = success
                    if (data.status == 'success') {
                        //swal berhasil
                        swal("Data berhasil diubah!", {
                            icon: "success",
                        });
                        //reload table
                        $('#tb_pasien').DataTable().ajax.reload();
                    } else {
                        //swal gagal
                        swal("Data gagal diubah!", {
                            icon: "error",
                            //rincian
                            text: data.error
                        });
                    }
                }
                //on error
            }).fail(function() {
                swal({
                    title: "Gagal!",
                    text: "Data gagal diubah!",
                    icon: "error",
                    button: "Tutup",
                });
            });
        });
    });
</script>
<?php
include '../../include/footer.php';
?>
</html>




    
