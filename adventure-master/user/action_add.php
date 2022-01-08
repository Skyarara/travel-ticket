<?php

require '../../conn.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$sql = "INSERT INTO [user](email, password) VALUES('$email', '$pass')";
$query = sqlsrv_query($conn, $sql);

$sql2 = "SELECT IDENT_CURRENT('[user]')";
$stmt2 = sqlsrv_query($conn, $sql2);
$id_user = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_NUMERIC);

$sql3 = "INSERT INTO petugas(id_user, nama_petugas) VALUES('$id_user[0]', '$nama')";
$query3 = sqlsrv_query($conn, $sql3);

echo"<script type='text/javascript'>
        alert('Berhasil Memasukan Petugas')
        window.location.href = 'index.php'
    </script>";