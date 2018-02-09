<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {

	/*****
     | CRUD dokter
     | controller dokter view, create, update, delete
     | by g2tech
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('mdokter');
		$this->load->model('mpoli');
        $this->load->helper('form','url');
    }

	public function index()
	{
	   	$jumlah= $this->mdokter->jumlah();
		$config['base_url'] = base_url().'index.php/dokter/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 		
 
		
		$dari = $this->uri->segment('3');
		$data['qdokter'] = $this->mdokter->lihat($config['per_page'],$dari);
		$this->pagination->initialize($config); 
		$this->load->view('dokter/vdokter',$data);
	}
	
    
    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$nip_dokter     		= addslashes($this->input->post('NIP_DOKTER'));
		$id_poli	     		= addslashes($this->input->post('ID_POLI'));
		$nama_dokter     		= addslashes($this->input->post('NAMA_DOKTER'));
		$spesialis	     		= addslashes($this->input->post('SPESIALIS'));
		$alamat_dokter	   		= addslashes($this->input->post('ALAMAT_DOKTER'));
		$tgl_lahir_dokter   	= addslashes($this->input->post('TGL_LAHIR_DOKTER'));
		$jenis_kelamin_dokter   = addslashes($this->input->post('JENIS_KELAMIN_DOKTER'));
		$no_telp_dokter	    	= addslashes($this->input->post('NO_TELP_DOKTER'));
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Dokter';
		    $data['aksi'] = 'aksi_add';
			$data['poli'] = $this->mpoli->get_allpoli(); //query model semua poli
            $this->load->view('dokter/vformdokter',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mdokter->get_dokter_byid($idu);
			$data['title'] = 'Edit Dokter';
		    $data['aksi'] = 'aksi_edit';
			$data['poli'] = $this->mpoli->get_allpoli(); //query model semua poli
            $this->load->view('dokter/vformdokter',$data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'NIP_DOKTER'       			=> $nip_dokter,
				'ID_POLI'       			=> $id_poli,
				'NAMA_DOKTER'     			=> $nama_dokter,
				'SPESIALIS'       			=> $spesialis,
				'ALAMAT_DOKTER'       		=> $alamat_dokter,
				'TGL_LAHIR_DOKTER' 			=> $tgl_lahir_dokter,
				'JENIS_KELAMIN_DOKTER'    	=> $jenis_kelamin_dokter,
				'NO_TELP_DOKTER'       		=> $no_telp_dokter
            );
            $this->mdokter->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('dokter');
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'NIP_DOKTER'       			=> $nip_dokter,
				'ID_POLI'       			=> $id_poli,
				'NAMA_DOKTER'     			=> $nama_dokter,
				'SPESIALIS'       			=> $spesialis,
				'ALAMAT_DOKTER'       		=> $alamat_dokter,
				'TGL_LAHIR_DOKTER' 			=> $tgl_lahir_dokter,
				'JENIS_KELAMIN_DOKTER'    	=> $jenis_kelamin_dokter,
				'NO_TELP_DOKTER'       		=> $no_telp_dokter
            );
            $this->mdokter->get_update($nip_dokter,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('dokter');
		}
    }
	
    // fungsi hapus
    public function hapus($gid){

        $this->mdokter->del_dokter($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Dokter berhasil dihapus</div>");
        redirect('dokter');
	}
	
	 // fungsi detail
    public function detail($id){
        $data['title'] = 'Detail Dokter'; //judul title
	    $data['qdokter'] = $this->mdokter->get_dokter_byid($id); //query model semua dokter
		$this->load->view('dokter/vdetdokter',$data);
    }
	
	//fungsi cari
	public function cari(){
		$this->load->model('mdokter');	 
		$cari = $this->input->post('cari');
			if($cari != ""){ 
				$data['qdokter'] = $this->mdokter->cari($cari);
				$this->load->view('dokter/vdokter',$data);
			}else{
				$data['qjadwal'] = "";
				$this->load->view('dokter/vdokter',$data);
	  	}
	}
}

/* End of file dokter.php */
/* Location: ./application/controllers/dokter.php s*/