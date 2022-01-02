<?php
    require_once '../../conn.php';
    require_once '../template/sidebar.php';
    require_once '../template/header.php';
    $sql = "SELECT * FROM rute JOIN transportasi ON rute.id_transportasi = transportasi.id_trasportasi JOIN type_transportasi 
    ON transportasi.id_type_transportasi = type_transportasi.id_type_transportasi";
    $stmt = sqlsrv_query($conn, $sql);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rute</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Rute</h6>
        <a href="add.php" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Rute Awal</th>
                    <th scope="col">Rute Akhir</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Waktu Berangkat</th>
                    <th scope="col">Waktu Sampai</th>
                </thead>
                <tbody>
                    <?php $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $a++ ?></td>
                        <td><?= $dt['rute_awal'] ?></td>
                        <td><?= $dt['rute_akhir'] ?></td>
                        <td><?= $dt['harga'] ?></td>
                        <td><?= $dt['waktu_berangkat'] ?></td>
                        <td><?= $dt['waktu_sampai'] ?></td>
                        <td>
                            <a href="delete_action.php?id=<?= $dt['id_rute'] ?>" class='btn btn-danger'>Hapus</a>
                            <a href="edit.php?id=<?= $dt['id_rute'] ?>" class='btn btn-warning'>Ubah</a>
                            <a href="detail.php?id=<?= $dt['id_rute'] ?>" class='btn btn-info'>View</a>
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