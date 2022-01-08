<?php
require_once '../../conn.php';
require_once '../template/sidebar.php';
require_once '../template/header.php';
    
    $id = $_GET['id'];
    $role = $_GET['role'];

    if($role == 'petugas'){
        $sql = "SELECT * FROM [user]
        JOIN petugas ON [user].id_user = petugas.id_user
        WHERE [user].id_user='$id'";
    }else{
        $sql = "SELECT * FROM [user]
        JOIN penumpang ON [user].id_user = penumpang.id_user
        WHERE [user].id_user='$id'";
    }
    $stmt = sqlsrv_query($conn, $sql);
    $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit USer</h6>
    </div>
    <div class="card-body">
        <form action="edit_action.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="role" value="<?= $role ?>">
            <?php if($role == 'petugas') : ?>
            <div class="form-group">
                <label>Nama Petugas</label>
                <input name="nama" type="text" class="form-control" value="<?= $data['nama_petugas'] ?>"
                    placeholder="Nama Petugas" required>
            </div>
            <?php else : ?>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input name="nama" type="text" class="form-control" value="<?= $data['nama_lengkap'] ?>"
                    placeholder="Nama Petugas" required>
            </div>
            <div class="form-group">
                <label>No Telp</label>
                <input name="telp" type="text" class="form-control" value="<?= $data['no_telp'] ?>"
                    placeholder="Nama Petugas" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk" class='form-control'>
                    <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' :'' ?>>Pria</option>
                    <option value="W" <?= $data['jenis_kelamin'] == 'W' ? 'selected' :'' ?>>Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <?php
                    $a = date_format($data['tgl_lahir'], 'Y-m-d');
                    $date = date('Y-m-d',strtotime($a));
                ?>
                <input name="date" type="date" class="form-control" value="<?= $date ?>" placeholder="Tanggal Lahir"
                    required>
            </div>
            <?php endif;?>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" value="<?= $data['email'] ?>" placeholder="Email"
                    required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="pass" type="text" class="form-control" placeholder="Password">
                <small style='color: red'>Kosongkan jika tidak mau diubah</small>
            </div>
            <button type="submit" class="btn btn-warning">Ubah</button>
        </form>
    </div>


    <?php
require_once '../template/footer.php';
?>