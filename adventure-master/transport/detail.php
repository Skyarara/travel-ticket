<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';

$id = $_GET['id'];

$sql = "SELECT * FROM type_transportasi";
$stmt = sqlsrv_query($conn, $sql);

$sql2 = "SELECT * FROM transportasi WHERE id_trasportasi='$id'";
$stmt2 = sqlsrv_query($conn, $sql2);
$data = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Tipe Transportasi</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Tipe Transportasi</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama Tipe</label>
            <select name="type" class='form-control' disabled>
                <option value="">--- Pilih Kelas ---</option>
                <?php while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                <option value="<?= $dt['id_type_transportasi'] ?>" value='<?= $data['kode'] ?>'
                    <?= $data['id_type_transportasi'] ==  $dt['id_type_transportasi'] ? 'selected' : '' ?>>
                    <?= $dt['nama_type'] ?>
                </option>
                <?php endwhile;?>
            </select>
        </div>
        <div class="form-group">
            <label>Kode</label>
            <input type="text" name='kode' class='form-control' value='<?= $data['kode'] ?>' readonly>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class='form-control' disabled>
                <option value="">--- Pilih Kelas ---</option>
                <option value="Bisnis" <?= $data['kelas'] == 'Bisnis' ? 'selected' : '' ?>>Bisnis</option>
                <option value="Ekonomi" <?= $data['kelas'] == 'Ekonomi' ? 'selected' : '' ?>>Ekonomi</option>
                <option value="Biasa" <?= $data['kelas'] == 'Biasa' ? 'selected' : '' ?>>Biasa</option>
            </select>
        </div>
        <div class="form-group">
            <label>JumlahKursi</label>
            <input type="number" name='kursi' class='form-control' value='<?= $data['jumlah_kursi'] ?>' readonly>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="ket" placeholder="Keterangan" class="form-control" cols="30" rows="10"
                readonly><?= $data['keterangan'] ?></textarea>
        </div>
        <a href='index.php' class="btn btn-info">Back</a>
    </div>


    <?php
    require_once '../template/footer.php';
?>