<?php 
    require_once '../../conn.php';
    session_start();
    $id = $_GET['id'];
    $id_petugas = $_SESSION['data']['id_petugas'];
    $sql = "UPDATE pemesanan SET status=1, id_petugas='$id_petugas' WHERE id_pemesanan='$id'";
    $query = sqlsrv_query($conn, $sql);

    header("Location: index.php");
?>