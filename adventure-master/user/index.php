<?php
    require_once '../template/sidebar.php';
    require_once '../template/header.php';
    require_once '../../conn.php';

    $sql = "SELECT [user].email, [user].id_user, nama_petugas nama, 'petugas' role FROM [user] 
            JOIN petugas ON [user].id_user = petugas.id_user
            UNION
            SELECT [user].email, [user].id_user, nama_lengkap nama, 'penumpang' role FROM [user]
            JOIN penumpang ON [user].id_user = penumpang.id_user
            ";
    $stmt = sqlsrv_query($conn, $sql);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
        <a href="add.php" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">email</th>
                    <th scope="col">Nama user</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <?php $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $a++ ?></td>
                        <td class="pl-0">
                            <div class="d-flex align-items-center"><?= $dt['email'] ?></div>
                        </td>
                        <td><?= $dt['nama'] ?></td>
                        <td><?= $dt['role'] ?></td>
                        <td>
                            <a href="delete_action.php?id=<?= $dt['id_user'] ?>" class='btn btn-danger'>Hapus</a>
                            <a href="edit.php?id=<?= $dt['id_user'] ?>&role=<?= $dt['role']?>"
                                class='btn btn-warning'>Edit</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
    require_once '../template/footer.php';
?>