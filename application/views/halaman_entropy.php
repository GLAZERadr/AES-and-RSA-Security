

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text">Halaman Pengujian Entropy</h5>
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
									<th>Secret Key</th>
                                    <th>Tanggal</th>
									<th>Aksi</th>
                                </tr>
                            </thead>
							
                            <tbody>
							<?php
                            $no=1;
                                foreach ($data_enkripsi->result() as $row) {
									$ujiEntropy = '<a href="' . site_url("Pengujian/PengujianEntropy/" . $row->id) . '" class="btn btn-info mb-1">Pengujian Entropy</a>';
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $hybridCrypto->getCipherText($row->lat_enkrip) . "</td>";
                                    echo "<td>" . $hybridCrypto->getCipherText($row->long_enkrip) . "</td>";
									echo "<td>" . $hybridCrypto->getSecretKey($row->lat_enkrip) . "</td>";
                                    echo "<td>" . $row->tanggal . "</td>";
									echo "<td class='text-center'>" . $ujiEntropy . "</td>";
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
</div>

