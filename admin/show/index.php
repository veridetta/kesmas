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
include "../../include/session_checker.php";
//call function on session_checker.php
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
//membuat halaman admin KHS Mahasiswa dengan bootsrap dan jquery cdn online
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lihat Data Karyawan</title>
    <?php
    //include assets.php
    include "../../include/assets.php";
    ?>
</head>
<body>
    <div class="container col-11" style="padding: 12px;">
        <div class="row">
            <!-- Tampilan Lengkap Data Karyawan--> 
            <div class="col-12">
                <div class="card" id="cetak">
                    <div class="card-header">
                        <!--judul text center-->
                        <h3 class="text-center">Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- menampilkan data karyawan -->
                            <!-- foto  nama lengkap, alamat, tempat tanggal lahir, jenis kelamin, agama,  no hp, email-->
                            <!-- ambil data dari table karyawan where id = id yang dikirim dari halaman index.php -->
                            <?php
                            //membuat variable id
                            $id = $_GET['id'];
                            //membuat query
                            $sql = "SELECT * FROM karyawan WHERE id='$id'";
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
                            }
                            ?>
                            <!-- foto di sebelah kiri, nama lengkap di sebelah kanan -->
                            <!-- membuat angka random dari 1-999 -->
                            <?php
                            $random = rand(1,999);
                            ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <!-- div col 12 -->
                                        <div class="col-12">
                                            <img src="https://gravatar.com/avatar/43240267c96887deafbc55190fbda6e6?s=400&d=mp&r=x" alt="" class="img-fluid col-12">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td><?php echo $data['nama_lengkap']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $data['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tanggal Lahir</td>
                                                <td><?php echo $data['tempat_tanggal_lahir']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td><?php echo $data['agama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td><?php echo $data['no_hp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $data['email']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="text-center">
                            <!-- membuat tombol cetak div id cetak dengan icon cetak-->
                            <button class="btn btn-primary" id="btn_cetak"><i class="fas fa-print"></i> Cetak</button>
                            <!-- button html2pdf pada halaman ini dengan div id cetak-->
                            <button class="btn btn-primary" onclick="html2pdf()"><i class="fas fa-file-pdf"></i> Save PDF</button>
                        </div>
                    </div>
                </div>
                <!-- JQUERY printThis -->
                <!-- include script printThis from cdn -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.14.0/printThis.min.js"></script>
                <!-- script cdn html2pdf -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
</script><script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
                <!-- script html2pdf -->
                <script>
                    
                        //membuat fungsi cetak
                        $("#btn_cetak").click(function(){
                            //memanggil fungsi printThis
                            $("#cetak").printThis();
                        });
                        //fungsi html2pdf
                        function html2pdf() {
                            //memanggil fungsi html2canvas
                            html2canvas(document.getElementById("cetak"), {
                                //membuat canvas
                                onrendered: function(canvas) {
                                    //membuat pdf
                                    var myImage = canvas.toDataURL("image/png");
                                    // Adjust width and height
                                    var imgWidth =  (canvas.width * 35) / 240;
                                    var imgHeight = (canvas.height * 40) / 240;
                                    // jspdf changes
                                    var pdf = new jsPDF('p', 'mm', 'a4');
                                    var imgProp = pdf.getImageProperties(myImage);
                                    var pdfWidth = pdf.internal.pageSize.getWidth();
                                    var pdfHeight = (imgProp.height * pdfWidth) / imgProp.width;
                                    pdf.addImage(myImage, 'png', 0, 0, pdfWidth, pdfHeight); // 2: 19
                                    pdf.save(`Data Karyawan <?php echo $data['nama_lengkap'];?>.pdf`);
                                }
                            });
                        }
                    
                    
                </script>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include '../../include/footer.php';
?>




    
