<?php
class Mpoli extends CI_Model {

    var $tabel = 'poli';
	private $table="poli";
    private $primary="ID_POLI";

    function __construct() {
        parent::__construct();
    }
	function lihat($sampai,$dari){
		return $query = $this->db->get('poli',$sampai,$dari)->result();
		
	}
	function jumlah(){
		return $this->db->get('poli')->num_rows();
	}
	function get_allpoli () {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        //cek apakah ada poli 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}

    function get_poli_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('ID_POLI', $id);

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

        $this->db->where('ID_POLI', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_poli ($id) {
        $this->db->where('ID_POLI', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
	 function cari($cari){
        $this->db->like("NAMA_POLI",$cari);
        return $this->db->get($this->table);
    }
}
?>
