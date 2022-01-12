<?php
    require_once '../../conn.php';
    require_once '../template/sidebar.php';
    require_once '../template/header.php';
    $sql = "SELECT * FROM transportasi JOIN type_transportasi ON transportasi.id_type_transportasi =
    type_transportasi.id_type_transportasi";
    $stmt = sqlsrv_query($conn, $sql);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transportasi</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Transportasi</h6>
        <a href="add.php" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped custom-table" id='myTable'>
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pesawat</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Jumlah Kursi</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <?php $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $a++ ?></td>
                        <td><?= $dt['nama_pesawat'] ?></td>
                        <td><?= $dt['kode'] ?></td>
                        <td><?= $dt['nama_type'] ?></td>
                        <td><?= $dt['jumlah_kursi'] ?></td>
                        <td>
                            <a href="delete_action.php?id=<?= $dt['id_trasportasi'] ?>" class='btn btn-danger'>Hapus</a>
                            <a href="edit.php?id=<?= $dt['id_trasportasi'] ?>" class='btn btn-warning'>Ubah</a>
                            <a href="detail.php?id=<?= $dt['id_trasportasi'] ?>" class='btn btn-info'>View</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>

</html>

<?php
  require_once '../template/footer.php';
?>