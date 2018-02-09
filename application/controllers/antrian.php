<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antrian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mantrian');
		$this->load->model('mpoli');
		$this->load->model('mtransaksi');
		$this->load->model('mjadwal');
		$this->load->model('mpasien');
        $this->load->helper('form','url');
        $this->load->helper('dompdf_helper');
        $this->load->helper(array('dompdf','dompdf_helper'));
    }

	public function index()
	{
	   	$jumlah= $this->mantrian->jumlah();
		$config['base_url'] = base_url().'index.php/antrian/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 

		$dari = $this->uri->segment('3');
		$data['qantrian'] = $this->mantrian->get_alljoin($config['per_page'],$dari);
		$data['qtransaksi'] = $this->mtransaksi->get_join_all();
		$data['qpoli'] = $this->mpoli->get_allpoli();
		$this->pagination->initialize($config); 
		$this->load->view('antrian/vantrian',$data);
	}

 	public function antrian_filter($filter=null){
 		if ($filter==null) {
	 	 	$filter = $this->input->get('ID_POLI');
	 	 	$data['qantrian'] = $this->mantrian->filter_poli($filter);
			$data['filter'] = $filter;
			$data['qtransaksi'] = $this->mtransaksi->get_join_all();
			$jumlah=0;
			foreach ($data['qantrian'] as $row) {
				$jumlah++;
			}
			$config['base_url'] = base_url().'index.php/pasien/antrian_filter/'.$filter;
			$config['per_page'] = $jumlah;
			
			$dari = $this->uri->segment('3');
			$qpoli = $this->mpoli->get_poli_byid($filter);
			foreach ($qpoli as $key) {
				$data['poli'] = $key->NAMA_POLI;
			}
			$this->pagination->initialize($config); 
			$this->load->view('antrian/antrian_poli',$data);
 		}else{
			$filter = $this->uri->segment(3);
	 	 	$tgl = $this->input->get('TGL_DAFTAR');
			$dari = $this->uri->segment('3');
			$data['qantrian'] = $this->mantrian->filter_politgl($filter,$tgl);
			$data['filter'] = $filter;
			$data['tanggal'] = $tgl;
			$jumlah=0;
			foreach ($data['qantrian'] as $row) {
				$jumlah++;
			}
			$config['base_url'] = base_url().'index.php/pasien/antrian_filter/'.$filter;
			$config['per_page'] = $jumlah;
			$data['qtransaksi'] = $this->mtransaksi->get_join_all();
			$qpoli = $this->mpoli->get_poli_byid($filter);
			foreach ($qpoli as $key) {
				$data['poli'] = $key->NAMA_POLI;
			}
			$this->pagination->initialize($config); 
			$this->load->view('antrian/antrian_poli',$data);
 		}
 	}

	public function daftar(){
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$username = $data['username'];
		$qpasien = $this->mpasien->get_pasien_byusername($username);
		foreach ($qpasien as $row) {
			$NIK_PASIEN = $row->NIK_PASIEN;
		}
		$daftar = 'belum';
		$hari_ini = date("Y-m-d");
		$qisi	= $this->mantrian->get_byuser($NIK_PASIEN);
		if(!empty($qisi)){
			foreach ($qisi as $row) {
				if ($row->TGL_DAFTAR >= $hari_ini) {
					$daftar = 'terdaftar';
					$hari_ini = $row->TGL_DAFTAR;
					$id_jadwal = $row->ID_JADWAL;
					$data['qjadwal'] = $this->mjadwal->get_id_join($id_jadwal);
				}
			}
		}
		$data['title'] = 'Pendaftaran Loket';
		$data['daftar'] = $daftar;
		$data['aksi'] = 'aksi_add';
		$data['qantrian'] = $this->mantrian->get_byuser_tgl($NIK_PASIEN, $hari_ini);
		$data['qpoli'] = $this->mpoli->get_allpoli();
		$this->load->view('pasien/pendaftaran',$data);
	}
	
    
    public function form(){
    	
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		$ID_POLI	  = addslashes($this->input->post('ID_POLI'));
		$KELUHAN	  = addslashes($this->input->post('KELUHAN'));
		$TGL_DAFTAR    = addslashes($this->input->post('TGL_DAFTAR'));
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah antrian';
		    $data['aksi'] = 'aksi_add';
			$data['poli'] = $this->mpoli->get_allpoli(); 
            $this->load->view('antrian/vformantrian',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mantrian->get_antrian_byid($idu);
			$data['title'] = 'Edit antrian';
		    $data['aksi'] = 'aksi_edit';
			$data['poli'] = $this->mpoli->get_allpoli();
            $this->load->view('antrian/vformantrian',$data);
		} else if ($mau_ke == "aksi_add") {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$username = $data['username'];
			$qpasien = $this->mpasien->get_pasien_byusername($username);
			foreach ($qpasien as $row) {
				$NIK_PASIEN = $row->NIK_PASIEN;
			}

			$day = date('D', strtotime($TGL_DAFTAR));
			$dayList = array(
				'Sun' => 'Minggu',
				'Mon' => 'Senin',
				'Tue' => 'Selasa',
				'Wed' => 'Rabu',
				'Thu' => 'Kamis',
				'Fri' => 'Jumat',
				'Sat' => 'Sabtu'
			);
			$qjadwal = $this->mjadwal->filter_poli_hari($ID_POLI, $dayList[$day]);
			foreach ($qjadwal as $row) {
				$ID_JADWAL = $row->ID_JADWAL;
			}

			$qantrian = $this->mantrian->get_byjadwal($ID_JADWAL);
			$hitung=0;
			foreach ($qantrian as $row) {
				$hitung++;
			}
			$NO_ANTRIAN = $hitung + 1;
			
			$TGL_MASUK   = date("Y-m-d");

			if ($dayList[$day] == 'Minggu') {
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i>   Tidak menerima pelayanan di hari minggu</div>");
			    redirect('antrian/daftar');
			} else if($ID_JADWAL == null){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i>   Jadwal tidak valid, silahkan periksa jadwal setiap poli di menu Jadwal</div>");
			    redirect('antrian/daftar');
			}else if($TGL_DAFTAR <= $TGL_MASUK){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i>   Pendaftaran hanya bisa dilakukan sehari sebelum tanggal daftar</div>");
			    redirect('antrian/daftar');
			}else{
				$data = array(
	                'ID_ANTRIAN'       	=> $ID_ANTRIAN,
					'NIK_PASIEN'       	=> $NIK_PASIEN,
					'ID_JADWAL'     	=> $ID_JADWAL,
					'NO_ANTRIAN'       	=> $NO_ANTRIAN,
					'KELUHAN'       	=> $KELUHAN,
					'TGL_MASUK' 		=> $TGL_MASUK,
					'TGL_DAFTAR'    	=> $TGL_DAFTAR
	            );
	            $this->mantrian->get_insert($data);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dimasukkan</div>");
				redirect('antrian/daftar');
			}
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_ANTRIAN'       	=> $ID_ANTRIAN,
				'NIK_PASIEN'       	=> $NIK_PASIEN,
				'ID_JADWAL'     	=> $ID_JADWAL,
				'NO_ANTRIAN'       	=> $NO_ANTRIAN,
				'KELUHAN'       	=> $KELUHAN,
				'TGL_MASUK' 		=> $TGL_MASUK,
				'TGL_DAFTAR'    	=> $TGL_DAFTAR
            );
            $this->mantrian->get_update($ID_ANTRIAN,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('antrian');
		}
    }
	
    // fungsi hapus
    public function hapus($gid){

        $this->mantrian->del_antrian($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> antrian berhasil dihapus</div>");
        redirect('antrian');
	}
	
	 // fungsi detail
    public function detail($id){
        $data['title'] = 'Detail antrian'; //judul title
	    $data['qantrian'] = $this->mantrian->get_join_byid($id); //query model semua antrian
		$this->load->view('antrian/vdetantrian',$data);
    }
	
	//fungsi cari
	public function cari(){
		$this->load->model('mantrian');	 
		$cari = $this->input->post('cari');
			if($cari != ""){ 
				$data['qantrian'] = $this->mantrian->cari($cari);
				$this->load->view('antrian/vantrian',$data);
			}else{
				$data['qjadwal'] = "";
				$this->load->view('antrian/vantrian',$data);
	  	}
	}
	function cetak($poli=null, $tanggal=null) {
	     $this->load->helper(array('dompdf', 'file'));
	     ini_set('memory_limit', '1280M');
	     if ($poli==null) {
	     	$tampil = $this->mantrian->get_alljoin();
	     } else if ($tanggal==null) {
	     	$tampil = $this->mantrian->filter_poli($poli);
	     } else{
	     	$tampil = $this->mantrian->filter_politgl($poli,$tanggal);
	     }
	     $temp=array('table_open'=>'<table border="1" cellpadding="2" border="1" width="85%"');
	     $this->table->set_template($temp);
	     $this->table->set_heading('No Antrian','Tanggal','Nama Poli','Nama Pasien','Nama Dokter','Keluhan');
	     $jum = 0;
	     foreach ($tampil as $datanya) {
	     	$jum++;
			$this->table->add_row(
				$datanya->NO_ANTRIAN,
				$datanya->TGL_DAFTAR,
				$datanya->NAMA_POLI,
				$datanya->NAMA_PASIEN,
				$datanya->NAMA_DOKTER,
				$datanya->KELUHAN);
		}
		$data['jumlah'] = $jum;
		$data['judul'] = 'Antrian';
		$data['tampilkan'] = $this->table->generate();

	    $html = $this->load->view('cetak', $data, true);
	    pdf_create($html, 'laporan antrian');   
	}

}

/* End of file antrian.php */
/* Location: ./application/controllers/antrian.php s*/