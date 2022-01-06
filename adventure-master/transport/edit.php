<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';

$id = $_GET['id'];

$sql = "SELECT * FROM type_transportasi";
$stmt = sqlsrv_query($conn, $sql);

$sql2 = "SELECT * FROM transportasi JOIN type_transportasi ON transportasi.id_type_transportasi =
type_transportasi.id_type_transportasi WHERE id_trasportasi='$id'";
$stmt2 = sqlsrv_query($conn, $sql2);
$data = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Tipe Transportasi</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Transportasi</h6>
    </div>
    <div class="card-body">
        <form action="edit_action.php" method="POST">
            <input type="hidden" value='<?= $id ?>' name='id'>
            <div class="form-group">
                <label>Nama Tipe</label>
                <input type="text" class='form-control' value='<?= $data['nama_type'] ?>' disabled>
            </div>
            <div class="form-group">
                <label>Kode</label>
                <input type="text" name='kode' class='form-control' value='<?= $data['kode'] ?>' required>
            </div>
            <div class="form-group">
                <label>JumlahKursi</label>
                <input type="number" name='kursi' class='form-control' value='<?= $data['jumlah_kursi'] ?>' required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="ket" placeholder="Keterangan" class="form-control" cols="30" rows="10"
                    readonly><?= $data['keterangan'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Ubah</button>
        </form>
    </div>


    <?php
require_once '../template/footer.php';
?>