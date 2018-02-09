<?php
class Mantrian extends CI_Model {

    var $tabel = 'antrian';
    private $primary="ID_ANTRIAN";

    function __construct() {
        parent::__construct();
    }

	function jumlah(){
		return $this->db->get('antrian')->num_rows();
	}
	function get_antrian_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('ID_ANTRIAN', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_byuser($NIK) {
        $this->db->from($this->tabel);
        $this->db->where('NIK_PASIEN', $NIK);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_byuser_tgl($NIK, $tgl) {
        $this->db->from($this->tabel);
        $this->db->where('NIK_PASIEN', $NIK);
        $this->db->where('TGL_DAFTAR', $tgl);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_byjadwal($id) {
        $this->db->from($this->tabel);
        $this->db->where('ID_JADWAL', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($id,$data) {

        $this->db->where('ID_ANTRIAN', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_antrian ($id) {
        $this->db->where('ID_ANTRIAN', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function filter_poli($poli){
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('poli.ID_POLI', $poli);
        $this->db->order_by("antrian.NO_ANTRIAN", "desc");
        return $this->db->get()->result();  
    }

    function filter_politgl($poli, $tgl){
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('poli.ID_POLI', $poli);
        $this->db->where('antrian.TGL_DAFTAR', $tgl);
        $this->db->order_by("antrian.NO_ANTRIAN", "desc");
        return $this->db->get()->result();
    }

    function get_alljoin($sampai,$dari){
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->order_by("antrian.NO_ANTRIAN", "desc");
        return $query = $this->db->get('',$sampai,$dari)->result();
    }
    function lihat($sampai,$dari){
        $this->db->from('antrian');
        return $query = $this->db->get('',$sampai,$dari)->result();
    }

    function get_join_byid($id){
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('antrian.ID_ANTRIAN', $id);
        return $this->db->get()->result();  
    }
}
?>

