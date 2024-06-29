<?php

class PengujianModel extends CI_Model
{

	public function getDataLokasiEnkrip()
    {
        return $this->db->get('data_enkripsi');
    }

	public function getDataLokasiById($id) 
	{
    $this->db->select('datalokasi.*, data_enkripsi.*');
    $this->db->from('datalokasi');
    $this->db->join('data_enkripsi', 'datalokasi.id = data_enkripsi.id', 'left');
    $this->db->where('datalokasi.id', $id);
    return $this->db->get();
	}

	public function getDataLokasiEnkripById($id) 
    {
        $this->db->where("id",$id);
        return $this->db->get('data_enkripsi');
    }


    public function dataAvaeff()
    {
        return $this->db->get('avalanche_effect')->result_array();
    }

    public function tambahDataAvaeff($data) 
    {
        $this->db->insert('avalanche_effect', $data);
    }

    public function hitungRataRata() {
        $this->db->select_avg('perbedaan_cipher', 'rata_perbedaan_cipher');
        $this->db->select_avg('persentase_perbedaan', 'rata_perbedaan_persentase');
        $query = $this->db->get('avalanche_effect');
        return $query->row_array();
    }

    public function hitungRataPerforma() {
        $this->db->select_avg('waktu_tanpa_algo', 'rata_performa_tanpa_algo');
        $this->db->select_avg('waktu_dengan_algo', 'rata_performa_dengan_algo');
        $this->db->select_avg('peningkatan', 'rata_peningkatan');
        $query = $this->db->get('performa_sistem');
        return $query->row_array();
    }

    public function dataPerforma()
    {
        return $this->db->get('performa_sistem')->result_array();
    }

    public function tambahDataPerforma($data) 
    {
        $this->db->insert('performa_sistem', $data);
    }

    public function dataIntegrity() 
    {
        return $this->db->get('integrity')->result_array();
    }

    public function tambahDataIntegrity($data)
    {
        $this->db->insert('integrity', $data);
    }
    public function dataEntrophyById($id)
    {
        $this->db->where('id_entrophy', $id);
        return $this->db->get('entrophy')->row();
    }

    public function tambahDataEntrophy($data) 
    {
        $this->db->insert('entrophy', $data);
    }

    public function updateDataEntrophy($id, $data)
    {
        $this->db->where('id_entrophy', $id)->update('entrophy', $data);
    }
}
?>
