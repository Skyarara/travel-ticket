<?php
require_once '../../conn.php';

$type = $_POST['type'];
$kode = $_POST['kode'];
$kursi = $_POST['kursi'];
$nama = $_POST['nama'];

$sql = "INSERT INTO transportasi(id_type_transportasi, kode, jumlah_kursi, nama_pesawat) 
        VALUES('$type', '$kode', '$kursi', '$nama')";

$stmt = sqlsrv_query( $conn, $sql );


if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');