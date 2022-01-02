<?php
 require_once '../adventure-master/template/header_home.php';
 ?>

<section class="section-gap info-area" id="about">
	<div class="container">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cari tiket</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cari tiket</h6>
    </div>
    <div class="card-body">
        <form>
        <div class="container">
        <div class="row">
        <div class="col align-self-start">
        <div class="p-3 py-5">
            <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Keberangkatan</label>
                <select name="Berangkat" class="form-control" >
                    <option value="" selected disabled hidden>Keberangkatan</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Semarang">Semarang</option>
                </select>
                </div>

                <div class="col-md-6"><label class="labels">Tujuan</label>
                <select name="Tujuan" class="form-control" >
                    <option value="" selected disabled hidden>Tujuan</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Semarang">Semarang</option>
                </select>
                </div>
            </div>
                <div class="row mt-3">
                <div class="col-md-12"><label for="birthday">Tanggal berangkat</label>
                <input type="date" name="tanggal" class="form-control"></div>
                
                <div class="col-md-12"><label>Jumlah Penumpang</label>
                <input name="jumlah" type="number" class="form-control" placeholder="Jumlah Penumpang" required></div>
            </div>
            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Cari</button></div>
            </div>
        </div>
    </div>
</div>
        </form>
    </div>
</div>
</section>
<?php
    require_once '../adventure-master/template/footer_home.php';
?>