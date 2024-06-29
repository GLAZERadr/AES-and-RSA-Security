<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include 'application/security/HybridCryptosystem.php';

class Home extends CI_Controller 
{
	private $hybridCrypto;

	public function __construct() {
        parent::__construct();
      
		$this->hybridCrypto = new HybridCryptosystem('application/security/encryption/public_key.pem', 'application/security/encryption/private_key.pem');
        $this->load->model("DataLokasiModel","",TRUE);
    }
	public function index(){
        $this->load->view('template');
		$this->load->view('beranda');
		$this->load->view('modal');
	}

	public function Enkripsi()
    {
		$data['title'] = 'Halaman Enkripsi ';
		$data['datalokasi'] = $this->DataLokasiModel->getDataLokasi();
		$data['data_enkripsi'] = $this->DataLokasiModel->getDataLokasiEnkrip();
		
		$data['hybridCrypto'] = $this->hybridCrypto;

        $this->load->view('template');
		$this->load->view('halaman_enkripsi', $data);
		$this->load->view('modal');
		
    }

	public function TambahDataLokasi() //menampilkan form tambah data lokasi
    {
        $data['title'] = 'Halaman Tambah Data Lokasi';
        $this->load->view('template');
		$this->load->view('tambah_datalokasi');
		$this->load->view('modal');
    }
    public function prosesTambahDataLokasi(){ //buat proses tambah data lokasi
        if ($this->DataLokasiModel->prosesTambahDataLokasi()) { //manggil method prosesTambahDataLokasi di class DataLokasiModel
            //dilakukan pengecekan apakah form tambah data telah diisi
            redirect(site_url("Home/Enkripsi")); //url dialihkan dengan menampilkan halaman data lokasi
            //jika form tambah data telah diisi dan berhasil menambahkan data
        } else {
            redirect(site_url("Home/TambahDataLokasi")); //tetap menampilkan halaman tambah data lokasi
        }
    }

	public function FormEnkripsi($id=NULL)
    {
		$data['title'] = 'Halaman Form Enkripsi Data Lokasi ';
		$data['datalokasi'] = $this->DataLokasiModel->getDataLokasiById($id)->row();
        $this->load->view('template');
		$this->load->view('form_enkripsi', $data);
		$this->load->view('modal');
    }

	public function prosesEnkripsi($id=NULL) 
	{
		$lat = $this->input->post('latitude');
		$long = $this->input->post('longitude');
		$secret_key = $this->input->post('secret_key');

		log_message('debug', 'Data received: lat=' . $lat . ', long=' . $long . ', secret=' . $secret_key);

		$encrypted_lat = $this->hybridCrypto->encryptData($lat, $secret_key);
		$encrypted_long = $this->hybridCrypto->encryptData($long, $secret_key);

		$data = array(
			'id' => $id,
			'lat_enkrip' => $encrypted_lat,
			'long_enkrip' => $encrypted_long
		);

		$this->DataLokasiModel->prosesEnkripsi($data);

		redirect('Home/Enkripsi');
	}

    public function Dekripsi() {
        $data['title'] = 'Halaman Dekripsi';
        $data['data_dekripsi'] = $this->DataLokasiModel->getDataLokasiDekrip()->result();
        $data['data_enkripsi'] = $this->DataLokasiModel->getDataLokasiEnkrip()->result();

		$data['hybridCrypto'] = $this->hybridCrypto;

        $this->load->view('template');
        $this->load->view('halaman_dekripsi', $data);
        $this->load->view('modal');
    }

	public function FormDekripsi($id=NULL)
    {
		$data['title'] = 'Halaman Form Dekripsi Secret Key dan Data Lokasi ';
		$data['data_enkripsi'] = $this->DataLokasiModel->getDataLokasiEnkripById($id)->row();
		$data['hybridCrypto'] = $this->hybridCrypto;

        $this->load->view('template');
		$this->load->view('form_dekripsi', $data);
		$this->load->view('modal');
    }

	public function prosesDekripsi($id=NULL) 
	{
		$lat = $this->input->post('latitude');
		$long = $this->input->post('longitude');

		log_message('debug', 'Data received: latitude=' . $lat . ', longitude=' . $long);

		$decrypted_lat = $this->hybridCrypto->decryptData($lat);
		$decrypted_long = $this->hybridCrypto->decryptData($long);

		log_message('debug', 'Data received: decrypted_lat=' . $decrypted_lat . ', decrypted_long=' . $decrypted_long);

		$data = array(
			'id' => $id,
			'lat_dekrip' => $decrypted_lat,
			'long_dekrip' => $decrypted_long
		);

		$this->DataLokasiModel->prosesDekripsi($data);

		redirect('Home/Dekripsi');
	}

	
	
}
