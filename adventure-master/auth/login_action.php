<?php
require_once '../../conn.php';
session_start();

$email = $_POST['email'];

$sql = "SELECT password, id_user FROM [user] WHERE email='$email'";
$stmt = sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($stmt) != TRUE){
    echo"<script type='text/javascript'>
    alert('Email tidak ditemukan')
    window.location.href = 'login.php'
    </script>";
    exit;
}
$data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);

$password = $_POST['pass'];
if (password_verify($password, $data[0]) == FALSE) {
        echo"<script type='text/javascript'>
                alert('Password Salah')
                window.location.href = 'login.php'
            </script>";
        exit;
}

$_SESSION['login'] = TRUE;

$sql2 = "SELECT * FROM petugas WHERE id_user='$data[1]'";
$stmt2 = sqlsrv_query($conn, $sql2);

if(sqlsrv_has_rows($stmt2) != TRUE){
    $sql2 = "SELECT * FROM penumpang WHERE id_user='$data[1]'";
    $stmt2 = sqlsrv_query($conn, $sql2);
    $dt = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
    $_SESSION['data'] = [
        'id' => $data[1],
        'nama' => $dt['nama_lengkap']
    ];
    echo"<script type='text/javascript'>
        alert('Selamat Datang User')
        window.location.href = '../user_dashboard/index.php'
    </script>";
    exit;
}else{
    $dt = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
    $_SESSION['data'] = [
        'id' => $data[1],
        'nama' => $dt['nama_petugas']
    ];
    echo"<script type='text/javascript'>
        alert('Selamat Datang Petugas')
        window.location.href = '../admin_dashboard/index.php'
    </script>";
}