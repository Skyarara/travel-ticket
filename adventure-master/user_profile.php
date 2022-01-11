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
            <select name="Gender" class="form-control" >
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
</div>
</div>
</div>



<?php
    require_once '../adventure-master/template/footer_home.php';
?>