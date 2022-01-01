<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';
  $sql = "SELECT * FROM transportasi JOIN type_transportasi ON transportasi.id_type_transportasi = type_transportasi.id_type_transportasi";
  $stmt = sqlsrv_query($conn, $sql);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Rute</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Rute</h6>
    </div>
    <div class="card-body">
        <form action="action_add.php" method="POST">
        <select name="type_tras" class='form-control' required>
                    <option value="">--- Pilih Transportasi ---</option>
                    <?php while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <option value="<?= $dt['id_trasportasi'] ?>"><?= $dt['nama_type'] ?></option>
                    <?php endwhile;?>
                </select>
            <div class="form-group">
                <label>Nama Rute Awal</label>
                <input name="ruteA" type="text" class="form-control" placeholder="Nama Rute Awal" required>
            </div>
            <div class="form-group">
                <label>Nama Rute Akhir</label>
                <input name="ruteB" type="text" class="form-control" placeholder="Nama Rute Akhir" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name='harga' class='form-control' required>
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