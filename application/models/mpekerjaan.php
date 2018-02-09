<?php
class Mpekerjaan extends CI_Model {

    var $tabel = 'pekerjaan';
	private $table="pekerjaan";
    private $primary="ID_PEKERJAAN";

    function __construct() {
        parent::__construct();
    }
	function lihat($sampai,$dari){
		return $query = $this->db->get('pekerjaan',$sampai,$dari)->result();
		
	}
	function jumlah(){
		return $this->db->get('pekerjaan')->num_rows();
	}
	function get_allpekerjaan() {
        $this->db->from($this->tabel);
		$query = $this->db->get();
        return $query->result();
	}

    function get_pekerjaan_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('ID_PEKERJAAN', $id);

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

        $this->db->where('ID_PEKERJAAN', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_pekerjaan ($id) {
        $this->db->where('ID_PEKERJAAN', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
	 function cari($cari){
        $this->db->like("NAMA_PEKERJAAN",$cari);
        return $this->db->get($this->table);
    }
}
?>
