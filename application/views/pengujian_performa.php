
<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Pengujian Performa Sistem</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" action="<?=site_url('Pengujian/prosesUjiPerforma')?>" enctype="multipart/form-data">
				<div class="mb-3">
                    <label>Banyak Data</label>
                    <input type="text" class="form-control" name="banyak_data" id="banyak_data"  placeholder="Masukkan banyaknya data pada sistem" required>
                </div>
				<div class="mb-3">
                    <label>Waktu Sistem tanpa Algoritma Kriptografi (s)</label>
                    <input type="text" class="form-control" name="datalokasi_sebelum" id="datalokasi_sebelum"  placeholder="Masukkan waktu sistem sebelum.." required>
                </div>
				<div class="mb-3">
                    <label>Waktu Sistem dengan Algoritma Kriptografi (s)</label>
                    <input type="text" class="form-control" name="datalokasi_setelah" id="datalokasi_setelah"  placeholder="Masukkan waktu sistem setelah.." required>
                </div>
 
                <hr>
                <button type="submit" class="btn btn-info btn-block">Bandingkan</button>
            </form>
        </div>
    </div>

</div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-center">
            <h5 class="m-0 font-weight-bold text">Hasil Pengujian Performa Sistem</h5>
        </div>
        <div class="card-body">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Banyak Data</th>
                                    <th>Waktu Sistem tanpa Algoritma Kriptografi (s)</th>
                                    <th>Waktu Sistem dengan Algoritma Kriptografi (s)</th>
									<th>Peningkatan Waktu(s)</th>
                                </tr>
                            </thead>
							
                            <tbody>
							<?php
                                $no=1;
                                foreach ($data_performa as $hasil){
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $hasil['banyak_data'] . "</td>";
                                    echo "<td>" . $hasil['waktu_tanpa_algo'] . "</td>";
                                    echo "<td>" . $hasil['waktu_dengan_algo'] . "</td>";
                                    echo "<td>" . $hasil['peningkatan'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                            <?php $rata_rata = $this->PengujianModel->hitungRataPerforma(); ?>
                            <thead>
                                <tr>
                                    <td>Rata-rata</td>
                                    <td></td>
                                    <td><?php echo isset($rata_rata['rata_performa_tanpa_algo']) ? round($rata_rata['rata_performa_tanpa_algo'], 2) : ''; ?></td>
                                    <td><?php echo isset($rata_rata['rata_performa_dengan_algo']) ? round($rata_rata['rata_performa_dengan_algo'], 2) : ''; ?></td>
                                    <td><?php echo isset($rata_rata['rata_peningkatan']) ? round($rata_rata['rata_peningkatan'], 2) : ''; ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
