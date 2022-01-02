<?php
require_once '../../conn.php';

$type = $_POST['type'];
$kode = $_POST['kode'];
$kelas = $_POST['kelas'];
$kursi = $_POST['kursi'];
$ket = $_POST['ket'];

$sql = "INSERT INTO transportasi(id_type_transportasi, kode, kelas, jumlah_kursi, keterangan) 
        VALUES('$type', '$kode', '$kelas', '$kursi', '$ket')";

$stmt = sqlsrv_query( $conn, $sql );


if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');