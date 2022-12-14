<?php
    require_once '../../conn.php';
    require_once '../template/sidebar.php';
    require_once '../template/header.php';

    $sql1 = "SELECT * FROM transportasi JOIN type_transportasi ON transportasi.id_type_transportasi = type_transportasi.id_type_transportasi";
    $stmt1 = sqlsrv_query($conn, $sql1);

    $sql2 = "SELECT * FROM cities JOIN provinces ON cities.prov_id = provinces.prov_id";
    $stmt2 = sqlsrv_query($conn, $sql2);

    $stmt3 = sqlsrv_query($conn, $sql2);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Tiket</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Tiket</h6>
    </div>
    <div class="card-body">
        <form action="action_add.php" method="POST">
            <div class="form-group">
                <label>Nama Pesawat</label>
                <select name="type_tras" class='form-control js2' required>
                    <option value="">--- Pilih Transportasi ---</option>
                    <?php while($dt = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)): ?>
                    <option value="<?= $dt['id_trasportasi'] ?>">
                        <?= $dt['nama_pesawat'] ?> || <?= $dt['nama_type'] ?>
                    </option>
                    <?php endwhile;?>
                </select>
            </div>
            <div class="form-group">
                <label>Rute Awal</label>
                <select name="rute_awal" class='form-control js2' required>
                    <option value="">--- Pilih Rute Awal ---</option>
                    <?php while($dt = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)): ?>
                    <option value="<?= $dt['city_id'] ?>"><?= $dt['prov_name'].' | '. $dt['city_name'] ?></option>
                    <?php endwhile;?>
                </select>
            </div>
            <div class="form-group">
                <label>Rute Akhir</label>
                <select name="rute_akhir" class='form-control js2' required>
                    <option value="">--- Pilih Rute Akhir ---</option>
                    <?php while($dt = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)): ?>
                    <option value="<?= $dt['city_id'] ?>"><?= $dt['prov_name'].' | '. $dt['city_name'] ?></option>
                    <?php endwhile;?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name='harga' class='form-control' placeholder='Harga' required>
            </div>
            <div class="form-group">
                <label>Waktu Berangkat</label>
                <input type="datetime-local" name='waktu_berangkat' class='form-control' required>
            </div>

            <div class="form-group">
                <label>Waktu Sampai</label>
                <input type="datetime-local" name='waktu_sampai' class='form-control' required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>


    <?php
require_once '../template/footer.php';
?>