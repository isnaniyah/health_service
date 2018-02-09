<?php
class Mpasien extends CI_Model {

    var $tabel = 'pasien';
	private $table="pasien ";
    private $primary="NIK_PASIEN";

    function __construct() {
        parent::__construct();
    }
	function lihat($sampai,$dari){
		return $query = $this->db->get('pasien',$sampai,$dari)->result();
		
	}
	function jumlah(){
		return $this->db->get('pasien')->num_rows();
	}
	function get_allpasien () {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        //cek apakah ada pasien 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}

    function get_pasien_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('NIK_PASIEN', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
	
	function get_pasien_byusername($username) {
        $this->db->from($this->tabel);
        $this->db->where('USERNAME', $username);

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

        $this->db->where('NIK_PASIEN', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_pasien ($id) {
        $this->db->where('NIK_PASIEN', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
     function cari($cari){
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->like('pasien.NAMA_PASIEN', $cari);
        $this->db->or_like($this->primary,$cari);
        return $this->db->get()->result();  
    }
    function get_detail($id){
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('pekerjaan', 'pasien.ID_PEKERJAAN =pekerjaan.ID_PEKERJAAN');
        $this->db->where('pasien.NIK_PASIEN', $id);
        return $this->db->get()->result();  
    }  
}
?>
