<?php
    require_once '../../conn.php';
    require_once '../template/sidebar.php';
    require_once '../template/header.php';
    $sql = "SELECT * FROM pemesanan 
    LEFT JOIN penumpang ON pemesanan.id_penumpang = penumpang.id_penumpang 
    JOIN tiket ON pemesanan.id_tiket = tiket.id_tiket
    JOIN transportasi ON tiket.id_transportasi = transportasi.id_trasportasi";
    $stmt = sqlsrv_query($conn, $sql);
    if( $stmt === false ) {
        if( ($errors = sqlsrv_errors() ) != null) {
            echo $errors[0]['message'];
            exit;
        }
    }

    $sql2 = "SELECT * FROM cities JOIN provinces ON cities.prov_id = provinces.prov_id";
    $stmt2 = sqlsrv_query($conn, $sql2);
    $stmt3 = sqlsrv_query($conn, $sql2);

    $sql3 = "SELECT * FROM type_transportasi";
    $stmt4 = sqlsrv_query($conn, $sql3);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTiket">
            Pesan
        </button>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Nama Penumpang</th>
                    <th scope="col">Kode Pesawat</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <?php $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $a++ ?></td>
                        <td class="pl-0">
                            <div class="d-flex align-items-center">
                                <?= $dt['nama_lengkap'] ? $dt['nama_lengkap'] : 'Customer'.$dt['id_pemesanan'] ?>
                            </div>
                        </td>
                        <td><?= $dt['kode'] ?></td>
                        <td><?= date_format($dt['tanggal_pemesanan'], "d M, Y") ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="delete_action.php?id='<?= $dt['id_pemesanan'] ?>'"
                                    class='btn btn-danger'>Hapus</a>
                                <a href="detail.php?id='<?= $dt['id_pemesanan'] ?>'" class='btn btn-info'>Info</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalTiket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='get_ticket.php' method='GET'>
                    <div class="form-group">
                        <label>Rute Awal</label>
                        <select name="rute_awal" class='form-control js2' style="width: 100%" required>
                            <option value="">--- Pilih Rute Awal ---</option>
                            <?php while($dt = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)): ?>
                            <option value="<?= $dt['city_id'] ?>">
                                <?= $dt['prov_name'].' | '. $dt['city_name'] ?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rute Akhir</label>
                        <select name="rute_akhir" class='form-control js2' style="width: 100%" required>
                            <option value="">--- Pilih Rute Akhir ---</option>
                            <?php while($dt = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)): ?>
                            <option value="<?= $dt['city_id'] ?>"><?= $dt['prov_name'].' | '. $dt['city_name'] ?>
                            </option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Berangkat</label>
                        <input type="date" name='date' class="form-control" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Penumpang</label>
                        <input type="number" name='jumlah' class="form-control" placeholder="Jumlah Penumpang">
                    </div>
                    <div class="form-group">
                        <label>Kelas Kabin</label>
                        <select name="kelas" class='form-control' required>
                            <option value="">--- Pilih Kelas Kabin ---</option>
                            <?php while($dt = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC)): ?>
                            <option value="<?= $dt['id_type_transportasi'] ?>">
                                <?= $dt['nama_type'] ?>
                            </option>
                            <?php endwhile;?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pesan</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
    require_once '../template/footer.php';
?>