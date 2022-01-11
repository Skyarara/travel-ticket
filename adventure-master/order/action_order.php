<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';

$id= $_GET['id'];
$jumlah= $_GET['jumlah'];

$sql3 = "SELECT id_tiket, a.city_name awal, b.city_name akhir, harga, waktu_berangkat, waktu_sampai, 
        nama_pesawat, kode, nama_type, sisa_kursi FROM tiket 
        JOIN cities a ON a.city_id = tiket.rute_awal
        JOIN cities b ON b.city_id = tiket.rute_akhir
        JOIN transportasi ON tiket.id_transportasi = transportasi.id_trasportasi
        JOIN type_transportasi ON transportasi.id_type_transportasi = type_transportasi.id_type_transportasi
        WHERE id_tiket = '$id'";

$query3 = sqlsrv_query($conn, $sql3);
$data= sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC);

$waktu_berangkat = date_format($data['waktu_berangkat'], "Y/m/d H:i:s");
$waktu_berangkat = date('d M, Y H:i:s', strtotime($waktu_berangkat));

$waktu_sampai = date_format($data['waktu_sampai'], "Y/m/d H:i:s");
$waktu_sampai = date('d M, Y H:i:s', strtotime($waktu_sampai));
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
        <form action="action_pesan.php" method="POST">
            <input type="hidden" name="id_tiket" value='<?= $data['id_tiket'] ?>'>
            <input type="hidden" name="harga_tiket" value='<?= $data['harga'] ?>'>
            <input type="hidden" name="kode" value='<?= $data['kode'] ?>'>
            <input type="hidden" name="sisa" value='<?= $data['sisa_kursi'] ?>'>
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
                <input type="text" name='jumlah' class='form-control' value='<?= $jumlah ?>' readonly>
            </div>
            <?php for($a=1;$a<=$jumlah;$a++):  ?>
            <label class='font-weight-bold'>Data Penumpang <?= $a ?></label>
            <div class="form-group">
                <label>Nama Penumpang</label>
                <input name='nama[]' type="text" class='form-control' required>
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input name='nik[]' type="text" class='form-control' required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk[]" class='form-control' required>
                    <option value="">--- Pilih Jenis Kelamin ---</option>
                    <option value="P">Pria</option>
                    <option value="W">Wanita</option>
                </select>
            </div>
            <?php endfor;  ?>
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>
    </div>

    <?php
require_once '../template/footer.php';
?>