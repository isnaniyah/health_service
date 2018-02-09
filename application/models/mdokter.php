<?php
class Mdokter extends CI_Model {

    var $tabel = 'dokter';
    private $primary="NIP_DOKTER";

    function __construct() {
        parent::__construct();
    }
	function lihat($sampai,$dari){
		$this->db->from('dokter')
		->join('poli', 'dokter.ID_POLI =poli.ID_POLI');
		return $query = $this->db->get('',$sampai,$dari)->result();
		
	}
	function jumlah(){
		return $this->db->get('dokter')->num_rows();
	}
	function get_dokter_byid($id) {
        $this->db->from($this->tabel)->join('poli', 'dokter.ID_POLI =poli.ID_POLI');
        $this->db->where('NIP_DOKTER', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
	function get_alldokter () {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        //cek apakah ada dokter 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($id,$data) {

        $this->db->where('NIP_DOKTER', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_dokter ($id) {
        $this->db->where('NIP_DOKTER', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
	 function cari($cari){
		$this->db->select('*');
		$this->db->from('dokter');
		$this->db->join('poli', 'dokter.ID_POLI =poli.ID_POLI');
		$this->db->like('dokter.NAMA_DOKTER', $cari);
		$this->db->or_like($this->primary,$cari);
		return $this->db->get()->result(); 	
    }	
    function getalldok_poli(){
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->join('poli', 'dokter.ID_POLI =poli.ID_POLI');
        return $this->db->get()->result();  
    }   
}
?>

