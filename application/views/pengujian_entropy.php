<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Pengujian Entropy</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" action="<?= site_url('Pengujian/prosesUjiEntropy/' . $data_enkripsi->id) ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Latitude Terenkripsi</label>
                    <input type="text" class="form-control" name="latitude_enkrip" id="latitude_enkrip" value="<?= $hybridCrypto->getCipherText($data_enkripsi->lat_enkrip) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Longitude Terenkripsi</label>
                    <input type="text" class="form-control" name="longitude_enkrip" id="longitude_enkrip" value="<?= $hybridCrypto->getCipherText($data_enkripsi->long_enkrip) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Secret Key Terenkripsi</label>
                    <input type="password" class="form-control" name="secret_key" id="secret_key" value="<?= $hybridCrypto->getSecretKey($data_enkripsi->lat_enkrip) ?>" readonly required>
                </div>

                <hr>
                <button type="submit" class="btn btn-info btn-block" <?= isset($entropy) ? 'disabled' : '' ?>>Hitung</button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-center">
            <h5 class="m-0 font-weight-bold text">Hasil Pengujian Entropy</h5>
        </div>
        <div class="card-body">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>Latitude Terenkripsi</td>
                                    <td>Longitude Terenkripsi</td>
                                    <td>Secret Key Terenkripsi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><?= isset($entropy->lat_en) ? $entropy->lat_en : '' ?></td>
                                    <td><?= isset($entropy->long_en) ? $entropy->long_en : '' ?></td>
                                    <td><?= isset($entropy->secret_key) ? $entropy->secret_key : '' ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td>Entropy</td>
                                    <td><?= isset($entropy->entrophy_lat) ? $entropy->entrophy_lat : '' ?></td>
                                    <td><?= isset($entropy->entrophy_long) ? $entropy->entrophy_long : '' ?></td>
                                    <td><?= isset($entropy->entrophy_secret_key) ? $entropy->entrophy_secret_key : '' ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
