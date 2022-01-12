<?php 
    include '../../conn.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM detail_pemesanan WHERE id_pemesanan ='$id'";
    $query = sqlsrv_query($conn, $sql); 

    $sql2 = "SELECT id_tiket, jumlah_penumpang FROM pemesanan WHERE id_pemesanan='$id'";
    $query2 = sqlsrv_query($conn, $sql2);
    $data= sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC, 1);

    $jumlah = $data['jumlah_penumpang'];
    $id_tiket = $data['id_tiket'];

    $sql3 = "DELETE FROM pemesanan WHERE id_pemesanan ='$id'";
    $query3 = sqlsrv_query($conn, $sql3);

    $sql4 = "SELECT sisa_kursi FROM tiket WHERE id_tiket='$id_tiket'";
    $query4 = sqlsrv_query($conn, $sql4);
    $data2= sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC, 1);
    $jumlah+=$data2['sisa_kursi'];

    $sql5 = "UPDATE tiket SET sisa_kursi='$jumlah' WHERE id_tiket='$id_tiket'";
    $query5 = sqlsrv_query($conn, $sql5);

    header("Location: index.php");

?>