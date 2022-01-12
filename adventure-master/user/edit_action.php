<?php
    require_once '../../conn.php';
    
    $id = $_POST['id'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];

    if($pass == NULL){
        $sql = "UPDATE [user] SET email='$email' WHERE id_user='$id'";
    }else{
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $sql = "UPDATE [user] SET email='$email', password='$pass' WHERE id_user='$id'";
    }
    
    $query = sqlsrv_query($conn, $sql);

    if($role == 'petugas'){
        $sql2 = "UPDATE petugas SET nama_petugas='$nama' WHERE id_user='$id'";
    }else{
        $telp = $_POST['telp'];
        $jk = $_POST['jk'];
        $date = $_POST['date'];
        $sql2 = "UPDATE penumpang SET nama_lengkap='$nama', no_telp='$telp', jenis_kelamin='$jk', tgl_lahir='$date' WHERE id_user='$id'";
    }

    $query2 = sqlsrv_query($conn, $sql2);

        // if( ($errors = sqlsrv_errors() ) != null) {
        // echo '<br>'.$errors[0]['message'];
        // exit;
        // }

    // exit;
    echo"<script type='text/javascript'>
        alert('Berhasil Mengubah $role')
        window.location.href = 'index.php'
    </script>";