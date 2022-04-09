<?php
//include file connect.php
include "../../../config/connect.php";
//tables
$table = 'karyawan';
//primary keys
$primaryKey='id';
//array nama lengkap, alamat, tempat tanggal lahir, jenis kelamin, agama,  no hp, email
$columns = array(
    array( 'db' => 'id', 'dt' => 1 ),
    array( 'db' => 'nama_lengkap', 'dt' => 2 ),
    array( 'db' => 'alamat', 'dt' => 3 ),
    array( 'db' => 'tempat_tanggal_lahir', 'dt' => 4 ),
    array( 'db' => 'jenis_kelamin', 'dt' => 5 ),
    array( 'db' => 'agama', 'dt' => 6 ),
    array( 'db' => 'no_hp', 'dt' => 7 ),
    array( 'db' => 'email', 'dt' => 8 ),
    array( 'db' => 'id', 'dt' => 9 )
);
//sql details
$sql_details = array(
    'user' => $user,
    'pass' => $pass,
    'db'   => $db,
    'host' => $host
);
require( '../../../config/ssp.class.php' );

//echo json encode
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);