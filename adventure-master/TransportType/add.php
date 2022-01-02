<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';
//   $sql = "SELECT * FROM type_transportasi";
//   $stmt = sqlsrv_query($conn, $sql);
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