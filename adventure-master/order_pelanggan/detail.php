<?php
require_once '../../conn.php';
require_once '../template/header_home2.php';

$id= $_GET['id'];

$sql = "SELECT tiket.id_tiket, a.city_name awal, b.city_name akhir, harga, waktu_berangkat, waktu_sampai,
        nama_pesawat, kode, nama_type, sisa_kursi, jumlah_penumpang FROM tiket 
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
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Oder <?= $data['nama_pesawat'] ?></h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Oder <?= $data['nama_pesawat'] ?></h6>
    </div>
    <div class="card-body">
        <form>
            <label>Detail Tiket</label>
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
            <div class="form-group">
                <label>Jumlah Penumpang</label>
                <input type="text" name='jumlah' class='form-control' value='<?= $data['jumlah_penumpang'] ?>' readonly>
            </div>
            <?php $a = 1; while($data2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)):  ?>
            <label class='font-weight-bold'>Data Penumpang <?= $a ?></label>
            <div class="form-group">
                <label>Nama Penumpang</label>
                <input type="text" class='form-control' value='<?= $data2['nama_penumpang'] ?>' readonly>
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input type="text" class='form-control' value='<?= $data2['nik'] ?>' readonly>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class='form-control' disabled>
                    <option value="">--- Pilih Jenis Kelamin ---</option>
                    <option value="P" <?= $data2['jenis_kelamin'] == 'P' ? 'selected' :'' ?>>Pria</option>
                    <option value="W" <?= $data2['jenis_kelamin'] == 'W' ? 'selected' :'' ?>>Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kode Tiket</label>
                <input type="text" class='form-control' value='<?= $data2['kode_kursi'] ?>' readonly>
            </div>
            <?php $a++; endwhile;  ?>
            <a href="index.php" class="btn btn-info">Back</a>
        </form>
    </div>

    <?php
require_once '../template/footer_home2.php';
?>