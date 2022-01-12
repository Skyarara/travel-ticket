<?php
    require_once '../conn.php';
    if(isset($_POST['submit'])){
        $id_user = $_POST['id_user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if($pass == NULL){
            $sql = "UPDATE [user] SET email='$email' WHERE id_user='$id_user'";
        }else{
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $sql = "UPDATE [user] SET email='$email', password='$pass' WHERE id_user='$id_user'";
        }
        
        $query = sqlsrv_query($conn, $sql);
        
        $nama = $_POST['nama'];
        $telp = $_POST['no_telp'];
        $jk = $_POST['jk'];
        $sql2 = "UPDATE penumpang SET nama_lengkap='$nama', no_telp='$telp', jenis_kelamin='$jk'
        WHERE id_user='$id_user'";

        $query2 = sqlsrv_query($conn, $sql2);

        if( ($errors = sqlsrv_errors() ) != null) {
        echo '<br>'.$errors[0]['message'];
        exit;
        }

        echo"<script type='text/javascript'>
            alert('Berhasil Memperbarui data')
        </script>";
    }
    require_once '../adventure-master/template/header_home.php';

    $id = $_SESSION['data']['id_penumpang'];
    $sql = "SELECT * FROM [user] 
            JOIN penumpang ON [user].id_user = penumpang.id_user
            WHERE penumpang.id_penumpang='$id'";
    $query = sqlsrv_query($conn, $sql);
    $data = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col align-self-start">
            <div class="p-3 py-5">
                <form action="" method="POST">
                    <input type="hidden" name="id_user" value='<?=$data['id_user']?>'>
                    <div class="d-flex justify-content-center">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Nama</label>
                            <input type="text" class="form-control" placeholder="Nama" name='nama'
                                value="<?= $data['nama_lengkap'] ?>">
                        </div>
                        <div class="col-md-6"><label class="labels">Jenis Kelamin</label>
                            <select name="jk" class='form-control'>
                                <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' :'' ?>>Pria</option>
                                <option value="W" <?= $data['jenis_kelamin'] == 'W' ? 'selected' :'' ?>>Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Nomor telepon</label>
                            <input type="text" class="form-control" name='no_telp' placeholder="Nomor Telepon"
                                value="<?= $data['no_telp'] ?>">
                        </div>
                        <div class="col-md-12"><label class="labels">Email</label>
                            <input type="text" class="form-control" name='email' placeholder="Email"
                                value="<?= $data['email'] ?>">
                        </div>
                        <div class="col-md-12"><label class="labels">Password</label>
                            <input type="password" class="form-control" name='pass' placeholder="Password">
                            <small style='color:red;'>Kosongkan jika tidak ingin diganti</small>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" name='submit' type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
    require_once '../adventure-master/template/footer_home.php';
?>