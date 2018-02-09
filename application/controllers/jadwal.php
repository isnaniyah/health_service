<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	/*****
     | CRUD jadwal
     | controller jadwal view, create, update, delete
     | by g2tech
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('mjadwal');
		$this->load->model('mdokter');
		$this->load->model('mpoli');
        $this->load->helper('form','url');
    }

	public function index()
	{
	   	$jumlah= $this->mjadwal->jumlah();
		$config['base_url'] = base_url().'index.php/jadwal/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 		
 
		
		$dari = $this->uri->segment('3');
		$data['qjadwal'] = $this->mjadwal->lihat($config['per_page'],$dari);
		$data['filter'] = $this->mpoli->get_allpoli();
		$this->pagination->initialize($config); 
		$this->load->view('jadwal/vjadwal',$data);
	}
	
    
    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$id_jadwal     			= addslashes($this->input->post('ID_JADWAL'));
		$nip_dokter     		= addslashes($this->input->post('NIP_DOKTER'));
		$hari     				= addslashes($this->input->post('HARI'));
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Jadwal';
		    $data['aksi'] = 'aksi_add';
			$data['dokter'] = $this->mdokter->getalldok_poli(); //query model semua dokter
            $this->load->view('jadwal/vformjadwal',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mjadwal->get_jadwal_byid($idu);
			$data['title'] = 'Edit Jadwal';
		    $data['aksi'] = 'aksi_edit';
			$data['dokter'] = $this->mdokter->getalldok_poli(); //query model semua dokter
            $this->load->view('jadwal/vformjadwal',$data);
		} else if ($mau_ke == "aksi_add") {
			$dokter = $this->mdokter->get_dokter_byid($nip_dokter);
			foreach ($dokter as $row) {
				$poli = $row->ID_POLI;
			}
			$jadwal = $this->mjadwal->filter_poli_hari($poli,$hari);
			$e=0;
			foreach ($jadwal as $row) {
				$e++;
			}
			if ($e > 0){
			    $data['title'] = 'Tambah Jadwal';
			    $data['aksi'] = 'aksi_add';
				$data['dokter'] = $this->mdokter->getalldok_poli();
				$this->session->set_flashdata("pesan",  "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Dokter jaga pada hari ini sudah ada, silahkan lakukan pengeditan data jika ingin meneruskan</div>");
				$this->load->view('jadwal/vformjadwal',$data);
			}else{
				$data = array(
	                'ID_JADWAL'       	=> $id_jadwal,
					'NIP_DOKTER'       	=> $nip_dokter,
					'HARI'     			=> $hari
	            );
	            $this->mjadwal->get_insert($data);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
				redirect('jadwal');
			}
        } else if ($mau_ke == "aksi_edit") {
			$dokter = $this->mdokter->get_dokter_byid($nip_dokter);
			foreach ($dokter as $row) {
				$poli = $row->ID_POLI;
			}
			$jadwal = $this->mjadwal->filter_poli_hari($poli,$hari);
			$e=0;
			foreach ($jadwal as $row) {
				$e++;
			}
			if ($e > 1){
			    $data['qdata']	= $this->mjadwal->get_jadwal_byid($id_jadwal);
				$data['title'] = 'Edit Jadwal';
			    $data['aksi'] = 'aksi_edit';
				$data['dokter'] = $this->mdokter->getalldok_poli();
				$this->session->set_flashdata("pesan",  "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Dokter jaga pada hari ini sudah ada, silahkan lakukan pengeditan data jika ingin meneruskan</div>");
	            $this->load->view('jadwal/vformjadwal',$data);
			}else{
				$data = array(
	                'ID_JADWAL'       	=> $id_jadwal,
					'NIP_DOKTER'       	=> $nip_dokter,
					'HARI'     			=> $hari
	            );
	            $this->mjadwal->get_update($id_jadwal,$data);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
				redirect('jadwal');
			}
		}
    }
	
    // fungsi hapus
    public function hapus($gid){

        $this->mjadwal->del_jadwal($gid);
        $this->session->set_flashdata("pesan",  "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Jadwal berhasil dihapus</div>");
        redirect('jadwal');
	}
	
	//fungsi cari
	public function cari(){
		$this->load->model('mjadwal');	 
		$cari = $this->input->post('cari');
			if($cari != ""){ 
				$data['qjadwal'] = $this->mjadwal->cari($cari);
				$this->load->view('jadwal/vjadwal',$data);
			}else{
				$data['qjadwal'] = "";
				$this->load->view('jadwal/vjadwal',$data);
	  	}
	}
}

/* End of file jadwal.php */
/* Location: ./application/controllers/jadwal.php s*/