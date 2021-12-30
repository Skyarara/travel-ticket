<?php
require_once '../../conn.php';

$nama = $_POST['nama'];
$ket = $_POST['ket'];

$sql = "INSERT INTO type_transportasi(nama_type, keterangan) VALUES('$nama', '$ket')";

$stmt = sqlsrv_query( $conn, $sql );    

if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');