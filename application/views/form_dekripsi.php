<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Form Dekripsi Secret Key dan Data Lokasi</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" action="<?=site_url('Home/prosesDekripsi')?>" enctype="multipart/form-data">
				<div class="mb-3">
                    <label>Latitude Terenkripsi</label>
                    <input type="text" class="form-control" name="latitude" id="latitude"  value="<?=$data_enkripsi->lat_enkrip?>" readonly  required>
                </div>
				<div class="mb-3">
					<label>Longitude Terenkripsi</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" value="<?=$data_enkripsi->long_enkrip?>" readonly  required>
                </div>
 
                <hr>
                <button type="submit" class="btn btn-info btn-block">Dekripsi</button>
            </form>
        </div>
    </div>

</div>
</div>

