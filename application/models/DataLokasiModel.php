<?php

class DataLokasiModel extends CI_Model
{
    public function getDataLokasi()
    {
        return $this->db->get('datalokasi');
    }
    
	public function getDataLokasiById($id) 
    {
        $this->db->where("id",$id);
        return $this->db->get('datalokasi');
    }


	public function getDataLokasiEnkrip()
    {
        return $this->db->get('data_enkripsi');
    }

	public function getDataLokasiDekrip()
    {
        return $this->db->get('data_dekripsi');
    }
    
	public function getDataLokasiEnkripById($id) 
    {
        $this->db->where("id",$id);
        return $this->db->get('data_enkripsi');
    }

	public function getDataLokasiDekripById($id) 
    {
        $this->db->where("id",$id);
        return $this->db->get('data_dekripsi');
    }

	public function prosesTambahDataLokasi(){
		$latitude = $this->input->post("latitude");
		$longitude = $this->input->post('longitude');
		
		$datalokasi = array(
			"latitude" => $latitude,
			"longitude" => $longitude,
		   
		);

		$this->db->where("id"); //ambil data dari database berdasarkan id
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Data Lokasi berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            //berhasil menambahkan data baru
            return $this->db->insert("datalokasi",$datalokasi);
	}

    public function prosesEnkripsi($data) 
    {
        $this->db->insert('data_enkripsi', $data);
    }

    public function prosesDekripsi($data) 
    {
        $this->db->insert('data_dekripsi', $data);
    }
}
?>
