<?php
class Mjadwal extends CI_Model {

    var $tabel = 'jadwal';
    private $primary="ID_JADWAL";

    function __construct() {
        parent::__construct();
    }
	function lihat($sampai,$dari){
		$this->db->from('jadwal')
		->join('dokter', 'jadwal.NIP_DOKTER =dokter.NIP_DOKTER');
		return $query = $this->db->get('',$sampai,$dari)->result();
		
	}

	function jumlah(){
		return $this->db->get('jadwal')->num_rows();
	}
	function get_jadwal_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('ID_JADWAL', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($id,$data) {

        $this->db->where('ID_JADWAL', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_jadwal ($id) {
        $this->db->where('ID_JADWAL', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
	 function cari($cari){
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
		$this->db->like('dokter.NAMA_DOKTER', $cari);
		$this->db->or_like($this->primary,$cari);
		return $this->db->get()->result(); 	
    }
    function filter_poli($poli){
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('poli.ID_POLI', $poli);
        return $this->db->get()->result();  
    }   
    function filter_poli_hari($poli, $hari){
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('poli.ID_POLI', $poli);
        $this->db->where('jadwal.HARI', $hari);
        return $this->db->get()->result();  
    }   
    function get_id_join($id){
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('jadwal.ID_JADWAL', $id);
        return $this->db->get()->result();  
    }
    function get_all_join(){
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        return $this->db->get()->result();  
    }   
}
?>

