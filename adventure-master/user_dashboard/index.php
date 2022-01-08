<?php
    require_once '../template/sidebar.php';
    require_once '../template/header.php';
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<h4>Selamat Datang <?= $_SESSION['data']['nama'] ?></h4>

<?php
    require_once '../template/footer.php';
?>