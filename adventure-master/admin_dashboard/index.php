<?php
    require_once '../template/sidebar.php';
    require_once '../template/header.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <h4>Selamat Datang <?= $_SESSION['data']['nama'] ?></h4>
                    <!-- Content Row -->
                    <div class="row">

                    <?php
    require_once '../template/footer.php';
?>