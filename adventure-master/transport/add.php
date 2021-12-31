<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';
  $sql = "SELECT * FROM type_transportasi";
  $stmt = sqlsrv_query($conn, $sql);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Type Transportasi</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Type Transportasi</h6>
    </div>
    <div class="card-body">
        <form action="action_add.php" method="POST">
            <div class="form-group">
                <label>Nama Tipe</label>
                <select name="type" class='form-control' required>
                    <option value="">--- Pilih Kelas ---</option>
                    <?php while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <option value="<?= $dt['id_type_transportasi'] ?>"><?= $dt['nama_type'] ?></option>
                    <?php endwhile;?>
                </select>
            </div>
            <div class="form-group">
                <label>Kode</label>
                <input type="text" name='kode' class='form-control' required>
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class='form-control' required>
                    <option value="">--- Pilih Kelas ---</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Biasa">Biasa</option>
                </select>
            </div>
            <div class="form-group">
                <label>JumlahKursi</label>
                <input type="number" name='kursi' class='form-control' required>
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