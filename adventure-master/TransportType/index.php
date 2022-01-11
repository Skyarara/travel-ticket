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

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Tipe Transportasi</h6>
    <a href="add.php" class="btn btn-primary float-right">Tambah</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped custom-table">
        <thead>
          <th scope="col">No</th>
          <th scope="col">Nama Tipe</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Aksi</th>
        </thead>
        <tbody>
          <?php $a=1; while($dt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
          <tr>
            <td><?= $a++ ?></td>
            <td class="pl-0">
              <div class="d-flex align-items-center"><?= $dt['nama_type'] ?></div>
            </td>
            <td><?= $dt['keterangan'] ?></td>
            <td>
              <a href="delete_action.php?id_type='<?= $dt['id_type_transportasi'] ?>'" class='btn btn-danger'>Hapus</a>
              <a href="edit.php?id_type='<?= $dt['id_type_transportasi'] ?>'" class='btn btn-warning'>Edit</a>
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