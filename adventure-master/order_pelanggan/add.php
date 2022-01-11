<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';

$sql = "SELECT * FROM penumpang";
$query = sqlsrv_query($conn, $sql);

$sql2 = "SELECT * FROM tiket";
$query2 = sqlsrv_query($conn, $sql2);

$sql3 = "SELECT id_tiket, a.city_name awal, b.city_name akhir, harga, waktu_berangkat, waktu_sampai, nama_pesawat
        FROM tiket JOIN cities a ON a.city_id = tiket.rute_awal
        JOIN cities b ON b.city_id = tiket.rute_akhir
        JOIN transportasi ON tiket.id_transportasi = transportasi.id_trasportasi";
$query3 = sqlsrv_query($conn, $sql3);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
    </div>
    <div class="card-body">
        <form action="action_add.php" method="POST">
            <div class="form-group">
                <label>Pilih Penumpang</label>
                <select name="type_tras" class='form-control js2' required>
                    <option value="">--- Pilih Penumpang ---</option>
                    <?php while($penumpang = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)): ?>
                    <option value="<?= $penumpang['id_penumpang'] ?>">
                        <?= $penumpang['nama_lengkap'] ?>
                    </option>
                    <?php endwhile;?>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Tiket</label>
                <select name="type_tras" class='form-control js2' required>
                    <option value="">--- Pilih Tiket ---</option>
                    <?php while($tiket = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)): ?>
                    <option value="<?= $tiket['id_tiket'] ?>">
                        <?= $tiket['nama_pesawat'] .' '. $tiket['awal'] .' || '.$tiket['akhir']?>
                    </option>
                    <?php endwhile;?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Type</label>
                <input name="nama" type="text" class="form-control" placeholder="Nama Type" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="ket" placeholder="Keterangan" class="form-control" cols="30" rows="10"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>


    <?php
require_once '../template/footer.php';
?>