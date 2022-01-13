<?php
    require_once '../../conn.php';
    require_once '../template/sidebar.php';
    require_once '../template/header.php';
    $sql = "SELECT id_tiket, a.city_name awal, b.city_name akhir, harga, waktu_berangkat,
            waktu_sampai, nama_pesawat, sisa_kursi, nama_type FROM tiket
            JOIN cities a ON a.city_id = tiket.rute_awal
            JOIN cities b ON b.city_id = tiket.rute_akhir
            JOIN transportasi ON tiket.id_transportasi = transportasi.id_trasportasi
            JOIN type_transportasi ON transportasi.id_type_transportasi = type_transportasi.id_type_transportasi
            ";
    $stmt = sqlsrv_query($conn, $sql);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tiket</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Tiket</h6>
        <a href="add.php" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped custom-table" id='myTable'>
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pesawat</th>
                    <th scope="col">Rute Awal</th>
                    <th scope="col">Rute Akhir</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Waktu Berangkat</th>
                    <th scope="col">Waktu Sampai</th>
                    <th scope="col">Sisa Kursi</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <?php $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $a++ ?></td>
                        <td><?= $dt['nama_pesawat'] .' '. $dt['nama_type']?></td>
                        <td><?= $dt['awal'] ?></td>
                        <td><?= $dt['akhir'] ?></td>
                        <td><?= $dt['harga'] ?></td>
                        <td><?= date_format($dt['waktu_berangkat'], 'd M Y | H:i') ?></td>
                        <td><?= date_format($dt['waktu_sampai'], 'd M Y | H:i') ?></td>
                        <td><?= $dt['sisa_kursi'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="action_delete.php?id=<?= $dt['id_tiket'] ?>" class='btn btn-danger'>Hapus</a>
                                <a href="edit.php?id=<?= $dt['id_tiket'] ?>" class='btn btn-warning'>Ubah</a>
                                <a href="detail.php?id=<?= $dt['id_tiket'] ?>" class='btn btn-info'>View</a>
                            </div>
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