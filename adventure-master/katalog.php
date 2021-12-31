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
                <label>Keberangkatan</label>
                <select name="berangkat">
                    <option value="Bandung">Bandung</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Semarang">Semarang</option>
                </select>

                <br><label>Tujuan</label>
                <select name="Tujuan">
                    <option value="Bandung">Bandung</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Semarang">Semarang</option>
                </select>

                <br><label for="birthday">Tanggal berangkat:</label><br>
                <input type="date" name="tanggal">

                <br><br><label>Jumlah Penumpang</label><br>
                <input name="jumlah" type="number" placeholder="Jumlah Penumpang" required>
                <br><br>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
</div>
</section>
<?php
    require_once '../adventure-master/template/footer_home.php';
    ?>