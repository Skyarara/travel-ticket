<?php
  require_once '../../conn.php';
  require_once '../template/sidebar.php';
  require_once '../template/header.php';
  $sql = "SELECT * FROM type_transportasi";
  $stmt = sqlsrv_query($conn, $sql);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Type Transportasi</h1>
</div>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <title>Table Tipe Transportasi</title>
</head>

<body>


  <div class="container-fluid"><br><br>

  <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Tipe Transportasi</h6>
          </div>
          <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <th scope="col">No</th>
            <th scope="col">ID Tipe Transportasi</th>
            <th scope="col">Nama Tipe</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
          </thead>
          <tbody>
            <?php $a=1; while($dt = $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
            <tr>
              <td><?= $a++ ?></td>
              <td><?= $dt['id_type_transportasi'] ?></td>
              <td class="pl-0">
                <div class="d-flex align-items-center"><?= $dt['nama_type'] ?></div>
              </td>
              <td><?= $dt['keterangan'] ?></td>
              <td>
                <a class='btn btn-danger'>Hapus</a>
                <a class='btn btn-warning'>Edit</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      <br><br><br>
      &emsp;&emsp;&emsp;Tambah Tipe Transportasi
      <br><br>
      <form style="text-align: left;">
        <label for="ID tipe transportasi" style="color: white;">Name: </label>
        <input type="text" placeholder="ID tipe transportasi" required>
        <label for="nama tipe" style="color: white;">Feedback: </label>
        <input type="text" placeholder="Nama tipe transportasi" required>
        <label for="Keterangan" style="color: white;">Feedback: </label>
        <input type="text" placeholder="Keterangan" required>
        <br><br>&emsp;&emsp;&emsp;<input type="submit" value="Masukkan">
      </form>
    </div>
  </div>
</div>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
</body>

</html>

<?php
  require_once '../template/footer.php';
?>