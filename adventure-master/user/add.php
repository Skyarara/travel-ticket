<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Petugas</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Petugas</h6>
    </div>
    <div class="card-body">
        <form action="action_add.php" method="POST">
            <div class="form-group">
                <label>Nama Petugas</label>
                <input name="nama" type="text" class="form-control" placeholder="Nama Petugas" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="pass" type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>


    <?php
require_once '../template/footer.php';
?>