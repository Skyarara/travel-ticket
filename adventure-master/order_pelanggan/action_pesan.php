<?php

require '../../conn.php';
session_start();

$nama = $_POST['nama'];
$jk = $_POST['jk'];
$nik = $_POST['nik'];
$id_tiket = $_POST['id_tiket'];
$harga = $_POST['harga_tiket'];
$id_penumpang = $_SESSION['data']['id_penumpang'];
$jumlah = $_POST['jumlah'];
$date = date('Y-m-d');
$kode = $_POST['kode'];
$sisa = $_POST['sisa'];
$total_bayar = $harga * $jumlah; 


// var_dump($date);
// exit;

$sql = "INSERT INTO pemesanan(id_penumpang, id_tiket, tanggal_pemesanan, total_bayar, jumlah_penumpang, status)
        VALUES('$id_penumpang', '$id_tiket', '$date', '$total_bayar', '$jumlah', '0')";
$query = sqlsrv_query($conn, $sql);

if( $query === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

$sql2 = "SELECT IDENT_CURRENT('pemesanan')";
$stmt2 = sqlsrv_query($conn, $sql2);
$id_pemesanan = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_NUMERIC);



$sql3 = "INSERT INTO detail_pemesanan(id_pemesanan, nama_penumpang, nik, kode_kursi, jenis_kelamin) VALUES";
foreach($nama as $key => $dt){
    $kode_kursi = $kode.date('dmhis').$sisa;
    $sql3 .= " ('$id_pemesanan[0]', '$dt', '$nik[$key]', '$kode_kursi', '$jk[$key]'),";
    $sisa--;
}

$sql3 = substr($sql3, 0, strlen($sql3) - 1).";";
$query3 = sqlsrv_query($conn, $sql3);



header('Location: index.php');