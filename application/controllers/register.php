<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mregister');
        $this->load->model('mpekerjaan');
        $this->load->helper('form','url');
        $this->load->library('form_validation');
    }

	public function index()
	{ 
		$data['qpekerjaan'] = $this->mpekerjaan->get_allpekerjaan();
		$this->load->view('pasien/vformregister',$data);
	}

    public function form(){
    	//ambil id_ URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$nik_pasien  			= addslashes($this->input->post('NIK_PASIEN'));
		$id_pekerjaan			= addslashes($this->input->post('ID_PEKERJAAN'));
		$nama_pasien			= addslashes($this->input->post('NAMA_PASIEN'));
		$username				= addslashes($this->input->post('USERNAME'));
		$password		    	= addslashes($this->input->post('PASSWORD'));
		$con_password		    = addslashes($this->input->post('CON_PASSWORD'));
		$no_telp_pasien			= addslashes($this->input->post('NO_TELP_PASIEN'));
		$jenis_kelamin_pasien   = addslashes($this->input->post('JENIS_KELAMIN_PASIEN'));
		$gol_darah				= addslashes($this->input->post('GOL_DARAH'));
		$alamat     			= addslashes($this->input->post('ALAMAT'));
		$tgl_lahir				= addslashes($this->input->post('TGL_LAHIR'));
		$status     			= addslashes($this->input->post('STATUS'));

		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Pasien';
		    $data['aksi'] = 'aksi_add';
		    $data['qpasien'] = 'kosong';
		    $data['qpekerjaan'] = $this->mpekerjaan->get_allpekerjaan();
            $this->load->view('pasien/vformregister',$data);
		} else if ($mau_ke == "aksi_add") {
			$this->form_validation->set_message('required', ' Harus Diisi.');
			$this->form_validation->set_message('is_unique', ' Username Sudah Terdaftar');
			$this->form_validation->set_message('matches', 'Password Tidak Cocok ');
			$this->form_validation->set_rules('USERNAME','USERNAME','trim|is_unique[pasien.USERNAME]');
			$this->form_validation->set_rules('CON_PASSWORD','CON_PASSWORD','trim|matches[PASSWORD]');

			if ($this->form_validation->run() == FALSE){
	            $data['NIK_PASIEN'] = $nik_pasien;
				$data['ID_PEKERJAAN'] = $id_pekerjaan;
	            $data['NAMA_PASIEN'] = $nama_pasien;
				$data['USERNAME'] = $username;
	            $data['NO_TELP_PASIEN'] = $no_telp_pasien;
				$data['JENIS_KELAMIN_PASIEN'] = $jenis_kelamin_pasien;
	            $data['GOL_DARAH'] = $gol_darah;
				$data['ALAMAT'] = $alamat;
	            $data['TGL_LAHIR'] = $tgl_lahir;
				$data['STATUS'] = $status;
			    $data['title'] = 'Tambah Pasien';
			    $data['aksi'] = 'aksi_add';
			    $data['qpasien'] = 'ada';
			    $data['qpekerjaan'] = $this->mpekerjaan->get_allpekerjaan();
			    $this->session->set_flashdata("pesan",  form_error('CON_PASSWORD', '<span class="error">', '</span>'));
	            $this->load->view('pasien/vformregister',$data);
			}else{
				$data = array(
	                'NIK_PASIEN'     		=> $nik_pasien,
					'ID_PEKERJAAN'     		=> $id_pekerjaan,
	                'NAMA_PASIEN'	   		=> $nama_pasien,
					'USERNAME'		   		=> $username,
					'PASSWORD'     			=> md5($password),
	                'NO_TELP_PASIEN'	    => $no_telp_pasien,
					'JENIS_KELAMIN_PASIEN'  => $jenis_kelamin_pasien,
	                'GOL_DARAH'	    		=> $gol_darah,
					'ALAMAT'     			=> $alamat,
	                'TGL_LAHIR'	    		=> $tgl_lahir,
					'STATUS'     			=> $status
	            );
	            $this->mregister->get_insert($data);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
				redirect('welcome_pasien');
			}
    	}
	}
}
/* End of file lemari.php */
/* Location: ./application/controllers/lemari.php */