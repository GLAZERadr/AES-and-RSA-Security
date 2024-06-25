<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text">Halaman Dekripsi</h5>
        </div>
        <div class="card-body">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Latitude Terenkripsi</th>
                                    <th>Longitude Terenkripsi</th>
                                    <th>Secret Key Terenkripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                                // Get array of decrypted ids for easy lookup
                                $decrypted_ids = array();
                                foreach ($data_dekripsi as $row) {
                                    $decrypted_ids[] = $row->id;
                                }

                                foreach ($data_enkripsi as $row) {
                                    // Check if this id is in the decrypted list
                                    if (in_array($row->id, $decrypted_ids)) {
                                        $dekrip_secretkey_datalokasi = '<button class="btn btn-secondary mb-1" disabled>Telah Didekripsi</button>';
                                    } else {
                                        $dekrip_secretkey_datalokasi = '<a href="' . site_url("Home/FormDekripsi/" . $row->id) . '" class="btn btn-info mb-1">Dekripsi Secret Key dan Data Lokasi</a>';
                                    }

                                    echo "<tr>";
                                    echo "<td>" . $row->id . "</td>";
                                    echo "<td>" . $hybridCrypto->getCipherText($row->lat_enkrip) . "</td>";
                                    echo "<td>" . $hybridCrypto->getCipherText($row->long_enkrip) . "</td>";
                                    echo "<td>" . $hybridCrypto->getSecretKey($row->lat_enkrip) . "</td>";
                                    echo "<td class='text-center'>" . $dekrip_secretkey_datalokasi . "</td>";
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
            <h5 class="m-0 font-weight-bold text">Hasil Dekripsi</h5>
        </div>
        <div class="card-body">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Latitude Terdekripsi</th>
                                    <th>Longitude Terdekripsi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                                foreach ($data_dekripsi as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row->id . "</td>";
                                    echo "<td>" . $row->lat_dekrip . "</td>";
                                    echo "<td>" . $row->long_dekrip . "</td>";
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
