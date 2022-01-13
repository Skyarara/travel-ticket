<?php
    require_once '../../conn.php';

    $sql = "SELECT * FROM pemesanan 
    LEFT JOIN penumpang ON pemesanan.id_penumpang = penumpang.id_penumpang 
    LEFT JOIN petugas ON pemesanan.id_petugas = petugas.id_petugas
    JOIN tiket ON pemesanan.id_tiket = tiket.id_tiket
    JOIN transportasi ON tiket.id_transportasi = transportasi.id_trasportasi
    WHERE status ='1'";
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Free Hand</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold">Semua Transaksi Free Hand</h2>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <th scope="col">No</th>
                        <th scope="col">Nama Penumpang</th>
                        <th scope="col">Kode Pesawat</th>
                        <th scope="col">Kode Tiket</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Jumlah Penumpang</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Total Bayar</th>
                    </thead>
                    <tbody>
                        <?php $total = 0; $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td class="pl-0">
                                <div class="d-flex align-items-center">
                                    <?= $dt['nama_lengkap'] ? $dt['nama_lengkap'] : 'Customer'.$dt['id_pemesanan'] ?>
                                </div>
                            </td>
                            <td><?= $dt['kode'] ?></td>
                            <td><?= $dt['kode'].$dt['id_tiket'] ?></td>
                            <td><?= date_format($dt['tanggal_pemesanan'], "d M, Y") ?></td>
                            <td><?= $dt['jumlah_penumpang'] ?></td>
                            <td><?= $dt['nama_petugas'] ?></td>
                            <td><?= number_format($dt['total_bayar']) ?></td>
                            <!-- <td><?= $dt['status'] == 1 ?  'Selesai' : 'Belum Selesai' ?> -->
                            </td>
                        </tr>
                        <?php $total+=$dt['total_bayar']; endwhile; ?>
                        <tr>
                            <td colspan="6"></td>
                            <td>Total Transaksi:</td>
                            <td>Rp. <?= number_format($total); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    require_once '../template/footer.php';
?>

    <script>
        window.print();
        window.onafterprint = function () {
            window.location.href = 'index.php';
        }
    </script>