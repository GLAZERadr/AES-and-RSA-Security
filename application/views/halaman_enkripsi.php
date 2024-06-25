<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text">Halaman Enkripsi</h5>
        </div>
        <div class="card-body">
            <div class="box">
                <div class="box-header d-flex justify-content-between">
                    <a href="<?php echo site_url('Home/TambahDataLokasi'); ?>" class="btn btn-info mb-3">Tambah Data Lokasi</a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Collect encrypted IDs into an array
                                    $encrypted_ids = array();
                                    foreach ($data_enkripsi->result() as $row_encrypted) {
                                        $encrypted_ids[] = $row_encrypted->id;
                                    }

                                    foreach ($datalokasi->result() as $row) {
                                        if (in_array($row->id, $encrypted_ids)) {
                                            $enkrip_datalokasi_secretkey = '<button class="btn btn-secondary mb-1" disabled>Telah Dienkripsi</button>';
                                        } else {
                                            $enkrip_datalokasi_secretkey = '<a href="' . site_url("Home/FormEnkripsi/" . $row->id) . '" class="btn btn-info mb-1">Enkripsi Data Lokasi dan Secret Key</a>';
                                        }
                                        
                                        echo "<tr>";
                                        echo "<td>" . $row->id . "</td>";
                                        echo "<td>" . $row->latitude . "</td>";
                                        echo "<td>" . $row->longitude . "</td>";
                                        echo "<td>" . $row->tanggal . "</td>";
                                        echo "<td class='text-center'>" . $enkrip_datalokasi_secretkey . "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text">Hasil Enkripsi</h5>
        </div>
        <div class="card-body">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Latitude Terenkripsi</th>
                                    <th>Longitude Terenkripsi</th>
                                    <th>Secret Key Terenkripsi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data_enkripsi->result() as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row->id . "</td>";
                                        echo "<td>" . $hybridCrypto->getCipherText($row->lat_enkrip) . "</td>";
                                        echo "<td>" . $hybridCrypto->getCipherText($row->long_enkrip) . "</td>";
                                        echo "<td>" . $hybridCrypto->getSecretKey($row->lat_enkrip) . "</td>";
                                        echo "<td>" . $row->tanggal . "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
