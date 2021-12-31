<?php
require_once '../../conn.php';

$id = $_POST['id'];
$type = $_POST['type'];
$kode = $_POST['kode'];
$kelas = $_POST['kelas'];
$kursi = $_POST['kursi'];
$ket = $_POST['ket'];

$sql = "UPDATE transportasi SET id_type_transportasi = '$type', kode = '$kode', kelas='$kelas', jumlah_kursi='$kursi', keterangan='$ket' WHERE id_trasportasi = $id";

$stmt = sqlsrv_query( $conn, $sql );   

if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');