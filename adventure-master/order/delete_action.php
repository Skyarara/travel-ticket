<?php 
    include '../../conn.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM detail_pemesanan WHERE id_pemesanan ='$id'";
    $query = sqlsrv_query($conn, $sql); 
    
    $sql2 = "DELETE FROM pemesanan WHERE id_pemesanan ='$id'";
    $query2 = sqlsrv_query($conn, $sql2);

    header("Location: index.php");

?>