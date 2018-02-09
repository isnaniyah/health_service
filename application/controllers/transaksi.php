<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mtransaksi');
        $this->load->model('mantrian');
		$this->load->model('mpoli');
		$this->load->model('mjadwal');
		$this->load->model('mpasien');
        $this->load->helper('form','url');
    }

	public function index()
	{
	   	$jumlah= $this->mtransaksi->jumlah();
		$config['base_url'] = base_url().'index.php/transaksi/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5;
		$dari = $this->uri->segment('3');
		$data['qtransaksi'] = $this->mtransaksi->get_alljoin($config['per_page'],$dari);
		$data['qpoli'] = $this->mpoli->get_allpoli();
		$this->pagination->initialize($config); 
		$this->load->view('transaksi/vtransaksi',$data);
	}

 	public function transaksi_filter($filter=null){
 		if ($filter==null) {
	 	 	$filter = $this->input->get('ID_POLI');			
			$dari = $this->uri->segment('3');
			$data['qtransaksi'] = $this->mtransaksi->filter_poli($filter);
			$data['filter'] = $filter;
			$qpoli = $this->mpoli->get_poli_byid($filter);
			$jumlah=0;
			foreach ($data['qtransaksi'] as $row) {
				$jumlah++;
			}
			$config['base_url'] = base_url().'index.php/pasien/transaksi_filter/'.$filter;
			$config['per_page'] = 5;
			foreach ($qpoli as $key) {
				$data['poli'] = $key->NAMA_POLI;
			}
			$this->pagination->initialize($config); 
			$this->load->view('transaksi/transaksi_poli',$data);
 		}else{
			$filter = $this->uri->segment(3);
	 	 	$tgl = $this->input->get('TGL_DAFTAR');
			$dari = $this->uri->segment('4');
			$data['qtransaksi'] = $this->mtransaksi->filter_politgl($filter,$tgl);
			$data['filter'] = $filter;
			$data['tanggal'] = $tgl;
			$jumlah=0;
			foreach ($data['qtransaksi'] as $row) {
				$jumlah++;
			}
			$config['base_url'] = base_url().'index.php/pasien/transaksi_filter/'.$filter;
			$config['per_page'] = 5;
			
			$qpoli = $this->mpoli->get_poli_byid($filter);
			foreach ($qpoli as $key) {
				$data['poli'] = $key->NAMA_POLI;
			}
			$this->pagination->initialize($config); 
			$this->load->view('transaksi/transaksi_poli',$data);
 		}
 	}
    public function form(){
    	//ambil variabel URL
		$mau_ke				= $this->uri->segment(3);
		$idu				= $this->uri->segment(4);

		$ID_TRANSAKSI		= addslashes($this->input->post('ID_TRANSAKSI'));
		$ID_ANTRIAN	  		= addslashes($this->input->post('ID_ANTRIAN'));
		$DIAGNOSA_DOKTER	= addslashes($this->input->post('DIAGNOSA_DOKTER'));
		$TINDAKAN	  		= addslashes($this->input->post('TINDAKAN'));
		$BIAYA_PERIKSA	  	= addslashes($this->input->post('BIAYA_PERIKSA'));
		$BIAYA_ADMIN	  	= addslashes($this->input->post('BIAYA_ADMIN'));
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah transaksi';
		    $data['aksi'] = 'aksi_add';
		    $data['ID_ANTRIAN'] = $idu;
			$data['qantrian'] = $this->mantrian->get_join_byid($idu); 
            $this->load->view('transaksi/vformtransaksi',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mtransaksi->get_transaksi_byid($idu);
			$data['title'] = 'Edit transaksi';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('transaksi/vformtransaksi',$data);
		} else if ($mau_ke == "aksi_add") {
			$TGL_PERIKSA   = date("Y-m-d");
			$data = array(
	            'ID_TRANSAKSI'      => $ID_TRANSAKSI,
				'ID_ANTRIAN'       	=> $ID_ANTRIAN,
				'TGL_PERIKSA'     	=> $TGL_PERIKSA,
				'DIAGNOSA_DOKTER'   => $DIAGNOSA_DOKTER,
				'TINDAKAN'       	=> $TINDAKAN,
				'BIAYA_PERIKSA' 	=> $BIAYA_PERIKSA,
				'BIAYA_ADMIN'    	=> $BIAYA_ADMIN
	        );
	        $this->mtransaksi->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dimasukkan</div>");
			redirect('transaksi');
        } else if ($mau_ke == "aksi_edit") {
        	$TGL_PERIKSA	= addslashes($this->input->post('TGL_PERIKSA'));
          	$data = array(
                'ID_TRANSAKSI'      => $ID_TRANSAKSI,
				'ID_ANTRIAN'       	=> $ID_ANTRIAN,
				'TGL_PERIKSA'     	=> $TGL_PERIKSA,
				'DIAGNOSA_DOKTER'   => $DIAGNOSA_DOKTER,
				'TINDAKAN'       	=> $TINDAKAN,
				'BIAYA_PERIKSA' 	=> $BIAYA_PERIKSA,
				'BIAYA_ADMIN'    	=> $BIAYA_ADMIN
            );
            $this->mtransaksi->get_update($ID_TRANSAKSI,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('transaksi');
		}
    }
	
    public function hapus($gid){

        $this->mtransaksi->del_transaksi($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> transaksi berhasil dihapus</div>");
        redirect('transaksi');
	}
	
    public function detail($id){
        $data['title'] = 'Detail transaksi'; //judul title
	    $data['qtransaksi'] = $this->mtransaksi->get_join_byid($id); //query model semua transaksi
		$this->load->view('transaksi/vdettransaksi',$data);
    }
	public function cari(){
		$this->load->model('mtransaksi');	 
		$cari = $this->input->post('cari');
			if($cari != ""){ 
				$data['qtransaksi'] = $this->mtransaksi->cari($cari);
				$this->load->view('transaksi/vtransaksi',$data);
			}else{
				$data['qjadwal'] = "";
				$this->load->view('transaksi/vtransaksi',$data);
	  	}
	}

	function cetak($poli=null, $tanggal=null) {
	     $this->load->helper(array('dompdf', 'file'));
	     ini_set('memory_limit', '1280M');
	     if ($poli==null) {
	     	$tampil = $this->mtransaksi->get_alljoin();
	     } else if ($tanggal==null) {
	     	$tampil = $this->mtransaksi->filter_poli($poli);
	     } else{
	     	$tampil = $this->mtransaksi->filter_politgl($poli,$tanggal);
	     }
	     $temp=array('table_open'=>'<table border="1" cellpadding="2" border="1" width="85%"');
	     $this->table->set_template($temp);
	     $this->table->set_heading('Tanggal Periksa','Poli','Nama Pasien','Nama Dokter','Diagnosa','Tindakan','Biaya Admin','Biaya Periksa');
	     $jum = 0;
	     $admin=0;
	     $periksa=0;
	     foreach ($tampil as $datanya) {
	     	$jum++;
			$this->table->add_row(
				$datanya->TGL_PERIKSA,
				$datanya->NAMA_POLI,
				$datanya->NAMA_PASIEN,
				$datanya->NAMA_DOKTER,
				$datanya->DIAGNOSA_DOKTER,
				$datanya->TINDAKAN,
				$datanya->BIAYA_ADMIN,
				$datanya->BIAYA_PERIKSA);
			$admin = $admin + $datanya->BIAYA_ADMIN;
			$periksa = $periksa + $datanya->BIAYA_PERIKSA;
		}
		$data['jumlah'] = $jum;
		$data['b_admin'] = $admin;
		$data['b_periksa'] = $periksa;
		$data['judul'] = 'Transaksi';
		$data['tampilkan'] = $this->table->generate();

	    $html = $this->load->view('cetak_transaksi', $data, true);
	    pdf_create($html, 'laporan transaksi');   
	}
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php s*/