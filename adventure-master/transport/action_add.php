<?php
require_once '../../conn.php';

$type = $_POST['type'];
$kode = $_POST['kode'];
$kursi = $_POST['kursi'];

$sql = "INSERT INTO transportasi(id_type_transportasi, kode, jumlah_kursi) 
        VALUES('$type', '$kode', '$kursi')";

$stmt = sqlsrv_query( $conn, $sql );


if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');