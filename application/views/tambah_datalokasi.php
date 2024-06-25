<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Form Tambah Data Lokasi</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" action="<?=site_url('Home/prosesTambahDataLokasi')?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Latitude</label>
                    <input type="text" class="form-control" name="latitude"  placeholder="Masukkan Latitude" required>
                </div>
                <div class="mb-3">
                    <label>Longitude</label>
                    <input type="text" class="form-control" name="longitude"  placeholder="Masukkan Longitude" required>
                </div>
 
                <hr>
                <button type="submit" class="btn btn-info btn-block">Tambah Data</button>
            </form>
        </div>
    </div>

</div>
</div>

