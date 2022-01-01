<?php
require_once '../../conn.php';

$type = $_POST['type_tras'];
$rute_awal = $_POST['ruteA'];
$rute_akhir = $_POST['ruteB'];
$harga = $_POST['harga'];
$waktu_berangkat = $_POST['waktu_berangkat'];
$waktu_sampai = $_POST['waktu_sampai'];

$sql = "INSERT INTO rute(id_transportasi, rute_awal, rute_akhir, harga, waktu_berangkat,waktu_sampai) 
        VALUES('$type', '$rute_awal', '$rute_akhir', '$harga', '$waktu_berangkat', '$waktu_sampai')";

$stmt = sqlsrv_query( $conn, $sql );


if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');