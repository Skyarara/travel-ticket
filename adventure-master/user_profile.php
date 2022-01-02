<?php
 require_once '../adventure-master/template/header_home.php';
 ?>

<div class="container">
<div class="row">
<div class="col align-self-start">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-center">
            <h4 class="text-right">Profile Settings</h4>
        </div>
    <div class="row mt-2">
        <div class="col-md-6"><label class="labels">Nama</label><input type="text" class="form-control" placeholder="Nama" value=""></div>
        <div class="col-md-6"><label class="labels">Jenis Kelamin</label>
            <select name="Tujuan" class="form-control" >
                <option value="" selected disabled hidden>Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>
    </div>
        <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Nomor telepon</label><input type="text" class="form-control" placeholder="Nomor Telepon" value=""></div>
            <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control" placeholder="Alamat" value=""></div>
            <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value=""></div>
        </div>
    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Simpan</button></div>
    </div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Anggota keluarga</h6>
        <a href="add.php" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped custom-table">
                <thead>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nomor Telepon</th>
                </thead>
                <tbody>
                    <tr>
                        <td>089849783721</td>
                        <td>Jono</td>
                        <td>Pria</td>
                        <td>08430902901280</td>
                        <td>
                            <a href="#" class='btn btn-danger'>Hapus</a>
                            <a href="#" class='btn btn-warning'>Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?php
    require_once '../adventure-master/template/footer_home.php';
?>