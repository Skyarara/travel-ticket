<?php
require_once '../../conn.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$kursi = $_POST['kursi'];
$nama = $_POST['nama'];
$type = $_POST['type'];

$sql = "UPDATE transportasi SET id_type_transportasi='$type', kode='$kode', jumlah_kursi='$kursi', nama_pesawat='$nama' WHERE id_trasportasi = $id";

$stmt = sqlsrv_query( $conn, $sql );   

if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');