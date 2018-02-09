<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datapasien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mpasien');
		$this->load->model('mpekerjaan');
        $this->load->helper('form','url');
    }

	public function index()
	{
	   	$jumlah= $this->mpasien->jumlah();
		$config['base_url'] = base_url().'index.php/datapasien/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 		
 
		
		$dari = $this->uri->segment('3');
		$data['qpasien'] = $this->mpasien->lihat($config['per_page'],$dari);
		$this->pagination->initialize($config); 
		$this->load->view('datapasien/vpasien',$data);
	}
	
    
    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$NIK_PASIEN     		= addslashes($this->input->post('NIK_PASIEN'));
		$ID_PEKERJAAN	     	= addslashes($this->input->post('ID_PEKERJAAN'));
		$NAMA_PASIEN     		= addslashes($this->input->post('NAMA_PASIEN'));
		$USERNAME	     		= addslashes($this->input->post('USERNAME'));
		$PASSWORD		   		= addslashes($this->input->post('PASSWORD'));
		$TGL_LAHIR   			= addslashes($this->input->post('TGL_LAHIR'));
		$JENIS_KELAMIN_PASIEN   = addslashes($this->input->post('JENIS_KELAMIN_PASIEN'));
		$NO_TELP_PASIEN	    	= addslashes($this->input->post('NO_TELP_PASIEN'));
		$GOL_DARAH   			= addslashes($this->input->post('GOL_DARAH'));
		$ALAMAT					= addslashes($this->input->post('ALAMAT'));
		$STATUS	    			= addslashes($this->input->post('STATUS'));
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah pasien';
		    $data['aksi'] = 'aksi_add';
			$data['qpekerjaan'] = $this->mpekerjaan->get_allpekerjaan();
            $this->load->view('datapasien/vformpasien',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mpasien->get_pasien_byid($idu);
			$data['title'] = 'Edit pasien';
		    $data['aksi'] = 'aksi_edit';
			$data['qpekerjaan'] = $this->mpekerjaan->get_allpekerjaan();
            $this->load->view('datapasien/vformpasien',$data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'NIK_PASIEN'       			=> $NIK_PASIEN,
				'ID_PEKERJAAN'       		=> $ID_PEKERJAAN,
				'NAMA_PASIEN'     			=> $NAMA_PASIEN,
				'USERNAME'       			=> $USERNAME,
				'PASSWORD'	       			=> md5($PASSWORD),
				'TGL_LAHIR' 				=> $TGL_LAHIR,
				'JENIS_KELAMIN_PASIEN'    	=> $JENIS_KELAMIN_PASIEN,
				'NO_TELP_PASIEN'       		=> $NO_TELP_PASIEN,
				'GOL_DARAH' 				=> $GOL_DARAH,
				'ALAMAT'    				=> $ALAMAT,
				'STATUS'       				=> $STATUS
            );
            $this->mpasien->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('datapasien');
        } else if ($mau_ke == "aksi_edit") {
			$data = array(
                'NIK_PASIEN'       			=> $NIK_PASIEN,
				'ID_PEKERJAAN'       		=> $ID_PEKERJAAN,
				'NAMA_PASIEN'     			=> $NAMA_PASIEN,
				'USERNAME'       			=> $USERNAME,
				'PASSWORD'	       			=> md5($PASSWORD),
				'TGL_LAHIR' 				=> $TGL_LAHIR,
				'JENIS_KELAMIN_PASIEN'    	=> $JENIS_KELAMIN_PASIEN,
				'NO_TELP_PASIEN'       		=> $NO_TELP_PASIEN,
				'GOL_DARAH' 				=> $GOL_DARAH,
				'ALAMAT'    				=> $ALAMAT,
				'STATUS'       				=> $STATUS
            );
            $this->mpasien->get_update($NIK_PASIEN,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('datapasien');
		}
    }
	
    // fungsi hapus
    public function hapus($gid){

        $this->mpasien->del_pasien($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> pasien berhasil dihapus</div>");
        redirect('datapasien');
	}
	
	 // fungsi detail
    public function detail($id){
        $data['title'] = 'Detail pasien';
	    $data['qpasien'] = $this->mpasien->get_detail($id);
		$this->load->view('datapasien/vdetpasien',$data);
    }
	
	//fungsi cari
	public function cari(){
		$cari = $this->input->post('cari');
		$data['qpasien'] = $this->mpasien->cari($cari);
		$this->load->view('datapasien/vpasien',$data);
	}
}
