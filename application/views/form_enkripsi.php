<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Form Enkripsi Data Lokasi dan Secret Key</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" action="<?= site_url('Home/prosesEnkripsi') ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude" value="<?= $datalokasi->latitude ?>" readonly required>
                </div>
                <div class="mb-3">
                    <label>Longitude</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" value="<?= $datalokasi->longitude ?>" readonly required>
                </div>
                <div class="mb-3">
                    <label>Secret Key</label>
                    <input type="password" class="form-control" name="secret_key" id="secret_key" minlength="16" maxlength="16" placeholder="Masukkan Secret Key 16 bytes" required>
                </div>

                <hr>
                <button type="submit" class="btn btn-info btn-block">Enkripsi</button>
            </form>
        </div>
    </div>

</div>
</div>

