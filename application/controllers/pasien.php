<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('mjadwal');
        $this->load->model('mpasien');
        $this->load->model('mpoli');
		$this->load->model('mdokter');
	}
	
	public function index() {
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['username'];
	     $this->load->view('pasien/home', $data);
		 $this->load->view('pasien/dashboard', $data);
	   } else {
	     //Jika tidak ada session di kembalikan ke halaman login
	     redirect('welcome/login_index', 'refresh');
   		}
 	}
 	public function jadwal(){
	   	$jumlah= $this->mjadwal->jumlah();
		$config['base_url'] = base_url().'index.php/pasien/jadwal/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5;
		
		$dari = $this->uri->segment('3');
		$data['qjadwal'] = $this->mjadwal->lihat($config['per_page'],$dari);
		$data['filter'] = $this->mpoli->get_allpoli();
		$this->pagination->initialize($config); 
		$this->load->view('pasien/jadwal_dokter',$data);
 	}
 	public function jadwal_filter($filter=null){
 	 	$filter = $this->input->get('ID_POLI'); 
	   	$jumlah= $this->mjadwal->jumlah();
		$config['base_url'] = base_url().'index.php/pasien/jadwal_filter/'.$filter;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5;
		
		$dari = $this->uri->segment('3');
		$data['qjadwal'] = $this->mjadwal->filter_poli($filter);
		$data['filter'] = $this->mpoli->get_poli_byid($filter);
		$this->pagination->initialize($config); 
		$this->load->view('pasien/jadwal_dokter_poli',$data);
 	}
	public function ganti_password()
	{
	   if($this->session->userdata('logged_in'))
	   {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$username = $data['username'];
			$data['qdata']	= $this->mpasien->get_pasien_byusername($username);
			$data['title'] = 'Ganti Password';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('pasien/vgantipassword',$data);	
	   }
	   else
	   {
		 redirect('welcome_pasien/login_index', 'refresh');
	   }
	 }
	 

    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$NIK_PASIEN   	  					= addslashes($this->input->post('NIK_PASIEN'));
		$username		  	  				= addslashes($this->input->post('USERNAME'));
		
		$PASSWORD1     						= addslashes($this->input->post('pass'));
        $PASSWORD21     					= addslashes($this->input->post('KONFIRMASI_PASSWORD'));
		
		$PASSWORD_LAMA12 					= addslashes($this->input->post('PASSWORD_LAMA'));
        $PASSWORD_ACC   					= addslashes($this->input->post('PASSWORD_ACC'));
		
		$PASSWORD      		= md5($PASSWORD1);
        $PASSWORD2  	    = md5($PASSWORD21);
		$PASSWORD_LAMA	    = md5($PASSWORD_LAMA12);
		
		
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah pasien';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('pasien/vformpasien',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mpasien->get_pasien_byid($idu);
			$data['title'] = 'Edit pasien';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('pasien/vformgantipasien',$data);
		} else if ($mau_ke == "ganti_password") {
			$data['qdata']	= $this->mpasien->get_pasien_byid($idu);
			$data['title'] = 'Ganti Password';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('pasien/vformgantipassword',$data);	
		} else if ($mau_ke == "aksi_add") {
			if ($PASSWORD==$PASSWORD2 ) {
			$data = array(
                'NIK_PASIEN'       		=> $NIK_PASIEN,
                'USERNAME' 		      	=> $username,
				'PASSWORD'     		  	=> $PASSWORD
            );
            $this->mpasien->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('pasien');
			 } else {
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Password tidak cocok! </div>");
            redirect(base_url().'pasien/form/add');
         }
        } else if ($mau_ke == "aksi_edit") {
			if ($PASSWORD_LAMA==$PASSWORD_ACC) {
                if ($PASSWORD==$PASSWORD2 ) {
          $data = array(
                'NIK_PASIEN'       		=> $NIK_PASIEN,
                'USERNAME' 		      	=> $username,
				'PASSWORD'     		  	=> $PASSWORD  
            );
            $this->mpasien->get_update($NIK_PASIEN,$data);
			$this->session->set_flashdata("pesan", "
<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>
");
			redirect('pasien/ganti_password');
			} else {
            $this->session->set_flashdata("pesan", "
<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Password tidak cocok! </div>
");
			redirect(base_url().'pasien/form/ganti_password/'.$NIK_PASIEN);
			}
		 } else {
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Password lama salah! </div>");
            redirect(base_url().'pasien/form/ganti_password/'.$NIK_PASIEN);
            }   
		}

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */