<?php

require '../../conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM petugas WHERE id_user='$id'";
$query = sqlsrv_query($conn, $sql);

$sql = "DELETE FROM [user] WHERE id_user='$id'";
$query = sqlsrv_query($conn, $sql);

echo"<script type='text/javascript'>
    alert('Berhasil Menghapus Petugas')
    window.location.href = 'index.php'
</script>";