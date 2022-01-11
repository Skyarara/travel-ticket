<?php

require '../../conn.php';
session_start();

$nama = $_POST['nama'];
$jk = $_POST['jk'];
$nik = $_POST['nik'];
$id_tiket = $_POST['id_tiket'];
$harga = $_POST['harga_tiket'];
$id_petugas = $_SESSION['data']['id_petugas'];
$jumlah = $_POST['jumlah'];
$date = date('d-m-Y');
$kode = $_POST['kode'];
$sisa = $_POST['sisa'];
$total_bayar = $harga * $jumlah; 


$sql = "INSERT INTO pemesanan(id_petugas, id_tiket, tanggal_pemesanan, total_bayar, jumlah_penumpang, status)
        VALUES('$id_petugas', '$id_tiket', '$date', '$total_bayar', '$jumlah', '1')";
$query = sqlsrv_query($conn, $sql);

$sql2 = "SELECT IDENT_CURRENT('pemesanan')";
$stmt2 = sqlsrv_query($conn, $sql2);
$id_pemesanan = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_NUMERIC);



$sql3 = "INSERT INTO detail_pemesanan(id_pemesanan, nama_penumpang, nik, kode_kursi, jenis_kelamin) VALUES";
foreach($nama as $key => $dt){
    $kode_kursi = $kode.date('dmy').$sisa;
    $sql3 .= " ('$id_pemesanan[0]', '$dt', '$nik[$key]', '$kode_kursi', '$jk[$key]'),";
    $sisa--;
}

$sql3 = substr($sql3, 0, strlen($sql3) - 1).";";
$query3 = sqlsrv_query($conn, $sql3);

if( $query3 === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo $errors[0]['message'];
        exit;
    }
}

header('Location: index.php');