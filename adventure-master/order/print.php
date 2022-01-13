<?php
require_once '../../conn.php';

$id= $_GET['id'];
// $jumlah= $_GET['jumlah'];

$sql = "SELECT tiket.id_tiket, a.city_name awal, b.city_name akhir, harga, waktu_berangkat, waktu_sampai,
        nama_pesawat, kode, nama_type, sisa_kursi, jumlah_penumpang, tanggal_pemesanan FROM tiket 
        JOIN cities a ON a.city_id = tiket.rute_awal
        JOIN cities b ON b.city_id = tiket.rute_akhir
        JOIN transportasi ON tiket.id_transportasi = transportasi.id_trasportasi
        JOIN type_transportasi ON transportasi.id_type_transportasi = type_transportasi.id_type_transportasi
        JOIN pemesanan ON pemesanan.id_tiket = tiket.id_tiket
        WHERE id_pemesanan = '$id'";

$query = sqlsrv_query($conn, $sql);
$data= sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

$waktu_berangkat = date_format($data['waktu_berangkat'], "Y/m/d H:i:s");
$waktu_berangkat = date('d M, Y H:i:s', strtotime($waktu_berangkat));

$waktu_sampai = date_format($data['waktu_sampai'], "Y/m/d H:i:s");
$waktu_sampai = date('d M, Y H:i:s', strtotime($waktu_sampai));


$sql2 = "SELECT * FROM detail_pemesanan WHERE id_pemesanan='$id'";
$query2 = sqlsrv_query($conn, $sql2);
// if( $query3 === false ) {
// if( ($errors = sqlsrv_errors() ) != null) {
// echo $errors[0]['message'];
// exit;
// }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Free Hand</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pesanan <?= $data['nama_pesawat'] ?></h6>
            <h6 class="m-0 font-weight-bold text-primary">Tanggal
                Pemesanan<?= date_format($data['tanggal_pemesanan'], "d M, Y") ?>
            </h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label>Kode Pesawat</label>
                    <input type="text" class='form-control' value='<?= $data['kode'] ?>' readonly>
                </div>
                <div class="form-group">
                    <label>Tipe Pesawat</label>
                    <input type="text" class='form-control' value='<?= $data['nama_type'] ?>' readonly>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Rute Awal</span>
                    </div>
                    <input type="text" class="form-control" value='<?= $data['awal'] ?>' readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Rute Akhir</span>
                    </div>
                    <input type="text" class="form-control" value='<?= $data['akhir'] ?>' readonly>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Waktu Berangkat</span>
                    </div>
                    <input type="datetime" class="form-control" value='<?= $waktu_berangkat ?>' readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Waktu Sampai</span>
                    </div>
                    <input type="datetime" class="form-control" value='<?= $waktu_sampai ?>' readonly>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Jumlah Penumpang</span>
                    </div>
                    <input type="text" name='jumlah' class='form-control' value='<?= $data['jumlah_penumpang'] ?>'
                        readonly>
                </div>
                <?php $a = 1; while($data2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)):  ?>
                <label class='font-weight-bold'>Data Penumpang <?= $a ?></label>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Nama Penumpang</span>
                    </div>
                    <input type="text" class='form-control' value='<?= $data2['nama_penumpang'] ?>' readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">NIk</span>
                    </div>
                    <input type="text" class='form-control' value='<?= $data2['nik'] ?>' readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Jenis Kelamin</span>
                    </div>
                    <input type="text" class='form-control' value='<?= $data2['nik'] == 'P' ? 'Pria' :'Wanita' ?>'
                        readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold">Kode Tiket</span>
                    </div>
                    <input type="text" class='form-control' value='<?= $data2['kode_kursi'] ?>' readonly>
                </div>
                <?php $a++; endwhile;  ?>
            </form>
        </div>

        <?php
require_once '../template/footer.php';
?>
        <script>
            window.print();
            window.onafterprint = function () {
                window.location.href = 'index.php';
            }
        </script>