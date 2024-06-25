<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include 'application/security/HybridCryptosystem.php';

class Pengujian extends CI_Controller {
	public function __construct() {
        parent::__construct();
      
		$this->hybridCrypto = new HybridCryptosystem('application/security/encryption/public_key.pem', 'application/security/encryption/private_key.pem');
		$this->load->model("PengujianModel","",TRUE);

    }
	public function index(){
        $this->load->view('template');
		$this->load->view('beranda');
		$this->load->view('modal');
	}


	public function PengujianAvalanche()
    {
		$data['title'] = 'Halaman Form Pengujian Avalanche Effect ';
		$data['data_avaeff'] = $this->PengujianModel->dataAvaeff();
        $this->load->view('template');
		$this->load->view('pengujian_avalanche', $data);
		$this->load->view('modal');
    }

	public function prosesUjiAvalanche()
    {
		$koordinat = $this->input->post('koordinat');
		$koordinat_modif = $this->input->post('koordinat-modif');
		$secret_key = $this->input->post('key-enkripsi');

		if ($koordinat && $koordinat_modif && $secret_key) {
			$koordinat_en = $this->hybridCrypto->encryptData($koordinat, $secret_key);
			$koordinat_modif_en = $this->hybridCrypto->encryptData($koordinat_modif, $secret_key);

			list($bit_difference, $bit_difference_percentage) = $this->calculate_bit_difference($this->hybridCrypto->getCipherText($koordinat_en), $this->hybridCrypto->getCipherText($koordinat_modif_en));

			$data = array (
				'input_koordinat' => $koordinat,
				'ciphertext_input' => $koordinat_en,
				'input_modifikasi' => $koordinat_modif,
				'ciphertext_input_modif' => $koordinat_modif_en,
				'perbedaan_cipher' => $bit_difference,
				'persentase_perbedaan' => $bit_difference_percentage
			);

			$this->PengujianModel->tambahDataAvaeff($data);
			redirect("Pengujian/PengujianAvalanche");
		}
    }

	private function calculate_bit_difference($ciphertext1, $ciphertext2) {
        $diff = 0;
        for ($i = 0; $i < strlen($ciphertext1); $i++) {
            $byte1 = ord($ciphertext1[$i]);
            $byte2 = ord($ciphertext2[$i]);
            $xor = $byte1 ^ $byte2;
            $diff += count(array_filter(str_split(sprintf('%08b', $xor))));
        }

        $total_bits = strlen($ciphertext1) * 8; // total number of bits
        $percentage = round(($diff / $total_bits) * 100, 0);

        return [$diff, $percentage];
    }

	public function Entropy()
    {
		$data['title'] = 'Halaman Pengujian Entropy ';
        $data['data_enkripsi'] = $this->PengujianModel->getDataLokasiEnkrip();

		$data['hybridCrypto'] = $this->hybridCrypto;

        $this->load->view('template');
		$this->load->view('halaman_entropy', $data);
		$this->load->view('modal');
    }

	public function PengujianEntropy($id=NULL)
    {
		$data['title'] = 'Halaman Form Pengujian Entropy ';
		$data['data_enkripsi'] = $this->PengujianModel->getDataLokasiEnkripById($id)->row();
		$data['entropy'] = $this->PengujianModel->dataEntrophyById($id);

		$data['hybridCrypto'] = $this->hybridCrypto;

        $this->load->view('template');
		$this->load->view('pengujian_entropy', $data);
		$this->load->view('modal');
    }

	public function prosesUjiEntropy($id=NULL)
    {
		$lat_en = $this->input->post('latitude_enkrip');
		$long_en = $this->input->post('longitude_enkrip');
		$secret_key = $this->input->post('secret_key');

		log_message('debug', 'Data received: latitude=' . $lat_en . ', longitude=' . $long_en . ', secret key=' . $secret_key);

		//Process entropy
		$entropy_lat = $this->calculate_entropy($lat_en);
		$entropy_long = $this->calculate_entropy($long_en);
		$entropy_secret_key = $this->calculate_entropy($secret_key);

		log_message('debug', 'Data received entropy: latitude=' . $entropy_lat . ', longitude=' . $entropy_long . ', secret key=' . $entropy_secret_key);

		//push to database
		$data = array(
			'lat_en' => $lat_en,
			'long_en' => $long_en,
			'secret_key' => $secret_key,
			'entrophy_lat' => $entropy_lat,
			'entrophy_long' => $entropy_long,
			'entrophy_secret_key' => $entropy_secret_key,
		);

		$this->PengujianModel->tambahDataEntrophy($data);

		//redirect
		redirect('Pengujian/PengujianEntropy/' . $id);
    }

	private function calculate_entropy($data) {
		// Menghitung frekuensi setiap karakter
		$frequency = array();
		$data_len = strlen($data);
	
		for ($i = 0; $i < $data_len; $i++) {
			$char = $data[$i];
			if (array_key_exists($char, $frequency)) {
				$frequency[$char]++;
			} else {
				$frequency[$char] = 1;
			}
		}
	
		// Menghitung probabilitas setiap karakter dan entropi
		$entropy = 0.0;
		foreach ($frequency as $freq) {
			$prob = $freq / $data_len;
			$entropy -= $prob * log($prob, 2);
		}
	
		return $entropy;
	}

	public function PengujianPerforma()
    {
		$data['title'] = 'Halaman Form Pengujian Performa Sistem ';
		$data['data_performa'] = $this->PengujianModel->dataPerforma();
        $this->load->view('template');
		$this->load->view('pengujian_performa', $data);
		$this->load->view('modal');
    }

	public function prosesUjiPerforma()
    {
		$banyak_data = $this->input->post('banyak_data');
		$tanpa_algo = $this->input->post('datalokasi_sebelum');
		$dengan_algo = $this->input->post('datalokasi_setelah');

		$peningkatan = ($dengan_algo - $tanpa_algo);

		$data = array(
			'banyak_data' => $banyak_data,
			'waktu_tanpa_algo' => $tanpa_algo,
			'waktu_dengan_algo' => $dengan_algo,
			'peningkatan' => $peningkatan
		);

		$this->PengujianModel->tambahDataPerforma($data);
		redirect("Pengujian/PengujianPerforma");
    }	
}
