
<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Pengujian Avalanche Effect</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" action="<?=site_url('Pengujian/prosesUjiAvalanche')?>" enctype="multipart/form-data">
				<div class="mb-3">
                    <label>Koordinat Sebelum Diubah</label>
                    <input type="text" class="form-control" name="koordinat" id="koordinat" placeholder="Masukkan latitude\longitude sebelum diubah.." required>
                </div>
				<div class="mb-3">
                    <label>Koordinat Setelah Diubah</label>
                    <input type="text" class="form-control" name="koordinat-modif" id="koordinat-modif" placeholder="Masukkan latitude\longitude setelah diubah.." required>
                </div>
				<div class="mb-3">
                    <label>Secret Key</label>
                    <input type="text" class="form-control" name="key-enkripsi" id="key-enkripsi" placeholder="Masukkan secret key untuk enkripsi.." required>
                </div>
 
                <hr>
                <button type="submit" class="btn btn-info btn-block">Hitung</button>
            </form>
        </div>
    </div>

</div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-center">
            <h5 class="m-0 font-weight-bold text">Hasil Pengujian Avalanche Effect</h5>
        </div>
        <div class="card-body">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Input Awal</td>
                                <td>Ciphertext Awal</td>
                                <td>Input yang Diubah</td>
                                <td>Ciphertext yang Diubah</td>
                                <td>Perbedaan Ciphertext (bit)</td>
                                <td>Persentase Perbedaan (%)</td>
                            </tr>
                        </thead>
							
						<tbody>
							<?php
                            $no=1;
                                foreach ($data_avaeff as $hasil){
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $hasil['input_koordinat'] . "</td>";
                                    echo "<td>" . $hybridCrypto->getCipherText($hasil['ciphertext_input']) . "</td>";
                                    echo "<td>" . $hasil['input_modifikasi'] . "</td>";
                                    echo "<td>" . $hybridCrypto->getCipherText($hasil['ciphertext_input_modif']) . "</td>";
                                    echo "<td>" . $hasil['perbedaan_cipher'] . "</td>";
                                    echo "<td>" . $hasil['persentase_perbedaan'] . "</td>";
                                    echo"</tr>";
                                }
                            ?>
                        </tbody>
                        <?php $rata_rata = $this->PengujianModel->hitungRataRata(); ?>
                        <thead>
                            <tr>
                                <td>Rata-rata</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo isset($rata_rata['rata_perbedaan_cipher']) ? round($rata_rata['rata_perbedaan_cipher'], 2) : ''; ?></td>
                                <td><?php echo isset($rata_rata['rata_perbedaan_persentase']) ? round($rata_rata['rata_perbedaan_persentase'], 2) : ''; ?>%</td>
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
