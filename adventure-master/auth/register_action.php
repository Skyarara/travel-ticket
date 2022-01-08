<?php

require_once '../../conn.php';

$email = $_POST['email'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$sql1 = "INSERT INTO [user](email, password) VALUES('$email', '$pass')";
$stmt1 = sqlsrv_query($conn, $sql1);

if( $stmt1 === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        if(strpos($errors[0]['message'], 'Email Exists') !== false ){
            echo"<script type='text/javascript'>
                    alert('Email Sudah Terdaftar')
                    window.location.href = 'login.php'
                </script>";
        }else{
            echo '<br>'.$errors[0]['message'];
            exit;
        }
    }
}

$sql2 = "SELECT IDENT_CURRENT('[user]')";
$stmt2 = sqlsrv_query($conn, $sql2);
$id_user = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_NUMERIC);

$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$gender = $_POST['gender'];
$tgl_lahir = $_POST['tgl_lahir'];

$sql3 = "INSERT INTO penumpang (id_user, nama_lengkap, no_telp, jenis_kelamin, tgl_lahir) 
        VALUES('$id_user[0]', '$nama', '$no_telp', '$gender', '$tgl_lahir')";
$stmt3 = sqlsrv_query($conn, $sql3);

if( $stmt3 === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        echo '<br>'.$errors[0]['message'];
        exit;
    }
}

echo"<script type='text/javascript'>
        alert('Berhasil Mendaftar')
        window.location.href = 'login.php'
    </script>";