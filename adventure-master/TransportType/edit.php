<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';
$id = $_GET['id_type'];
$sql = "SELECT * FROM type_transportasi WHERE id_type_transportasi=$id";
$stmt = sqlsrv_query($conn, $sql);
$dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div>
    <div class="card-body">
        <form action="edit_action.php" method="POST">
            <div class="form-group">
                <label>Nama Type</label>
                <input name="id_type" type="text" Value="<?= $id ?>" hidden>
                <input name="nama1" type="text" class="form-control" placeholder="Nama Type" Value="<?= $dt['nama_type'] ?>" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="ket1" placeholder="Keterangan" class="form-control" cols="30" rows="10"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>


    <?php
require_once '../template/footer.php';
?>