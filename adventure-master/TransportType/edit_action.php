<?php
require_once '../../conn.php';

$id = $_POST['id_type'];
$nama = $_POST['nama1'];
$ket = $_POST['ket1'];

$sql = "UPDATE type_transportasi SET nama_type = '$nama', keterangan = '$ket' WHERE id_type_transportasi = $id";

$stmt = sqlsrv_query( $conn, $sql );   


if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');