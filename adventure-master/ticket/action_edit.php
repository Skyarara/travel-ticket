<?php
require_once '../../conn.php';

$id = $_POST['id'];
$type = $_POST['type_tras'];
$rute_awal = $_POST['rute_awal'];
$rute_akhir = $_POST['rute_akhir'];
$harga = $_POST['harga'];
$date = new DateTime($_POST['waktu_berangkat']);
$waktu_berangkat = $date->format('Y-m-d H:i:s');
$date2 = new DateTime($_POST['waktu_sampai']);
$waktu_sampai = $date2->format('Y-m-d H:i:s');
$sisa = $_POST['sisa'];

$sql = "UPDATE tiket SET id_transportasi='$type', rute_awal='$rute_awal', rute_akhir='$rute_akhir', 
        harga='$harga', waktu_berangkat='$waktu_berangkat', waktu_sampai='$waktu_sampai', sisa_kursi='$sisa'
        WHERE id_tiket='$id'";

$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');