<?php

require '../../conn.php';

$id = $_GET['id'];
$role = $_GET['role'];
if($role == 'petugas'){
    $sql = "DELETE FROM petugas WHERE id_user='$id'";
}else{
    $sql = "DELETE FROM penumpang WHERE id_user='$id'";
}

$query = sqlsrv_query($conn, $sql);
$sql = "DELETE FROM [user] WHERE id_user='$id'";
$query = sqlsrv_query($conn, $sql);

echo"<script type='text/javascript'>
    alert('Berhasil Menghapus $role')
    window.location.href = 'index.php'
</script>";