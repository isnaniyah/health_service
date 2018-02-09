<?php
class Mtransaksi extends CI_Model {

    var $tabel = 'transaksi_poli';
    private $primary="ID_TRANSAKSI";

    function __construct() {
        parent::__construct();
    }
	function lihat($sampai,$dari){
		$this->db->from('transaksi_poli');
		return $query = $this->db->get('',$sampai,$dari)->result();
		
	}
	function jumlah(){
		return $this->db->get('transaksi_poli')->num_rows();
	}
	function get_transaksi_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('ID_TRANSAKSI', $id);

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

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($id,$data) {

        $this->db->where('ID_TRANSAKSI', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_transaksi_poli ($id) {
        $this->db->where('ID_TRANSAKSI', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
    function get_join_byid($id){
        $this->db->select('*');
        $this->db->from('transaksi_poli');
        $this->db->join('antrian', 'transaksi_poli.ID_ANTRIAN = antrian.ID_ANTRIAN');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('transaksi_poli.ID_TRANSAKSI', $id);
        return $this->db->get()->result();  
    }
    function get_join_byantrian($id){
        $this->db->select('*');
        $this->db->from('transaksi_poli');
        $this->db->join('antrian', 'transaksi_poli.ID_ANTRIAN = antrian.ID_ANTRIAN');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('transaksi_poli.ID_ANTRIAN', $id);
        return $this->db->get()->result();  
    }
    function get_join_all(){
        $this->db->select('*');
        $this->db->from('transaksi_poli');
        $this->db->join('antrian', 'transaksi_poli.ID_ANTRIAN = antrian.ID_ANTRIAN');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        return $this->db->get()->result();  
    }

    function get_alljoin($sampai=null,$dari=null){
        $this->db->select('*');
        $this->db->from('transaksi_poli');
        $this->db->join('antrian', 'transaksi_poli.ID_ANTRIAN = antrian.ID_ANTRIAN');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        return $query = $this->db->get('',$sampai,$dari)->result();
    }

    function filter_poli($poli){
        $this->db->select('*');
        $this->db->from('transaksi_poli');
        $this->db->join('antrian', 'transaksi_poli.ID_ANTRIAN = antrian.ID_ANTRIAN');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('poli.ID_POLI', $poli);
        return $this->db->get()->result();  
    }

    function filter_politgl($poli, $tgl){
        $this->db->select('*');
        $this->db->from('transaksi_poli');
        $this->db->join('antrian', 'transaksi_poli.ID_ANTRIAN = antrian.ID_ANTRIAN');
        $this->db->join('pasien', 'antrian.NIK_PASIEN = pasien.NIK_PASIEN');
        $this->db->join('jadwal', 'antrian.ID_JADWAL = jadwal.ID_JADWAL');
        $this->db->join('dokter', 'jadwal.NIP_DOKTER = dokter.NIP_DOKTER');
        $this->db->join('poli', 'dokter.ID_POLI = poli.ID_POLI');
        $this->db->where('poli.ID_POLI', $poli);
        $this->db->where('antrian.TGL_DAFTAR', $tgl);
        return $this->db->get()->result();  
    }
}
?>

