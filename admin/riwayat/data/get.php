<?php
//include file connect.php
include "../../../config/connect.php";
//tables
$table = 'pasien';
//primary keys
$primaryKey='id';
//array nama lengkap, tempat lahir, tanggal lahir, jenis kelamin, agama, jenjang pendidikan, tahun lulus, no hp, email, tinggi badan, berat badan, foto
$columns = array(
    array( 'db' => 'id', 'dt' => 1 ),
    array( 'db' => 'nama_lengkap', 'dt' => 2 ),
    array( 'db' => 'tempat_lahir', 'dt' => 3 ),
    array( 'db' => 'tanggal_lahir', 'dt' => 4 ),
    array( 'db' => 'jenis_kelamin', 'dt' => 5 ),
    array( 'db' => 'agama', 'dt' => 6 ),
    array( 'db' => 'jenjang_pendidikan', 'dt' => 7 ),
    array( 'db' => 'tahun_lulus', 'dt' => 8 ),
    array( 'db' => 'no_hp', 'dt' => 9 ),
    array( 'db' => 'email', 'dt' => 10 ),
    array( 'db' => 'tinggi_badan', 'dt' => 11 ),
    array( 'db' => 'berat_badan', 'dt' => 12 ),
    //array return foto
    array(
        'db'        => 'foto',
        'dt'        => 13,
        'formatter' => function( $d, $row ) {
            return '<img src="../../img/'.$d.'" width="50" height="50">';
        }
    ),
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