<?php
    require_once '../../conn.php';
    require_once '../template/sidebar.php';
    require_once '../template/header.php';

    $rute_awal = $_GET['rute_awal'];
    $rute_akhir = $_GET['rute_akhir'];
    $date = new DateTime($_GET['date']);
    $jumlah = $_GET['jumlah'];
    $kelas = $_GET['kelas'];
    $datee = $date->format('m-d-Y');

    $sql = "SELECT id_tiket, a.city_name awal, b.city_name akhir, harga, waktu_berangkat, 
            waktu_sampai, nama_pesawat, nama_type
            FROM tiket
            JOIN cities a ON a.city_id = tiket.rute_awal
            JOIN cities b ON b.city_id = tiket.rute_akhir
            JOIN transportasi ON tiket.id_transportasi = transportasi.id_trasportasi
            JOIN type_transportasi ON transportasi.id_type_transportasi = type_transportasi.id_type_transportasi
            WHERE a.city_id = '$rute_awal' AND b.city_id = '$rute_akhir'
            AND CONVERT(VARCHAR, waktu_berangkat, 110) like '$datee'
            AND type_transportasi.id_type_transportasi='$kelas' 
            AND sisa_kursi >= '$jumlah'";

    $stmt = sqlsrv_query($conn, $sql);  

    if(sqlsrv_has_rows($stmt) == FALSE){
        echo '<script type="text/javascript">
            alert("Tiket Tidak Ada")
            window.location.href = "index.php";
            </script>';
        exit;
    }

    if( $stmt === false ) {
        if( ($errors = sqlsrv_errors() ) != null) {
            echo $errors[0]['message'];
            exit;
        }
    }

    $stmt2 = sqlsrv_query($conn, $sql);
    $rute= sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC, 1);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tiket</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tiket</h6>
        <h6 class="m-2 font-weight-bold">Rute Awal: <?= $rute['awal'] ?></h6>
        <h6 class="m-2 font-weight-bold">Rute Akhir: <?= $rute['akhir'] ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pesawat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Waktu Berangkat</th>
                    <th scope="col">Waktu Sampai</th>
                    <th scope="col">Tipe Kabin</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <?php $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $a++ ?></td>
                        <td><?= $dt['nama_pesawat'] ?></td>
                        <td>Rp. <?= number_format($dt['harga']) ?></td>
                        <td><?= date_format($dt['waktu_berangkat'], 'd M Y | H:i') ?></td>
                        <td><?= date_format($dt['waktu_sampai'], 'd M Y | H:i') ?></td>
                        <td><?= $dt['nama_type'] ?></td>
                        <td>
                            <a href="action_order.php?id=<?= $dt['id_tiket'] ?>&jumlah=<?= $jumlah ?>"
                                class='btn btn-success'>Pesan</a>
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