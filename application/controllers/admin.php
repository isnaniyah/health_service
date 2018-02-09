<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/*****
     | CRUD admin
     | controller admin view, create, update, delete
     | by g2tech
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('madmin');
        $this->load->helper('form','url');
    }
	
	public function index()
	{
	    $jumlah= $this->madmin->jumlah();
		$config['base_url'] = base_url().'index.php/admin/index/';
 
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 		
 
		
		$dari = $this->uri->segment('3');
		$data['qadmin'] = $this->madmin->lihat($config['per_page'],$dari);
		$this->pagination->initialize($config); 
		$this->load->view('admin/vadmin',$data);

	}

	public function ganti_password()
	{
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $username = $data['username'];
		 $data['qadmin'] = $this->madmin->get_admin_byusername($username); //query model semua admin
		 $this->load->view('admin/vgantipassword',$data);
	   }
	   else
	   {
		 //Jika tidak ada session di kembalikan ke halaman login
		 redirect('welcome/login_index', 'refresh');
	   }
	 }
	 

    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$id_admin   	  					= addslashes($this->input->post('ID_ADMIN'));
		$username		  	  				= addslashes($this->input->post('USERNAME'));
		
		$PASSWORD1     						= addslashes($this->input->post('pass'));
        $PASSWORD21     					= addslashes($this->input->post('KONFIRMASI_PASSWORD'));
		
		$PASSWORD_LAMA12 					= addslashes($this->input->post('PASSWORD_LAMA'));
        $PASSWORD_ACC   					= addslashes($this->input->post('PASSWORD_ACC'));
		
		$PASSWORD      		= md5($PASSWORD1);
        $PASSWORD2  	    = md5($PASSWORD21);
		$PASSWORD_LAMA	    = md5($PASSWORD_LAMA12);
		
		
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Admin';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('admin/vformadmin',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->madmin->get_admin_byid($idu);
			$data['title'] = 'Edit Admin';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('admin/vformgantiadmin',$data);
		} else if ($mau_ke == "ganti_password") {
			$data['qdata']	= $this->madmin->get_admin_byid($idu);
			$data['title'] = 'Ganti Password';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('admin/vformgantipassword',$data);	
		} else if ($mau_ke == "aksi_add") {
			if ($PASSWORD==$PASSWORD2 ) {
			$data = array(
                'ID_ADMIN'       		=> $id_admin,
                'USERNAME' 		      	=> $username,
				'PASSWORD'     		  	=> $PASSWORD
            );
            $this->madmin->get_insert($data);
			$this->session->set_flashdata("pesan", "
<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>
");
			redirect('admin');
			 } else {
            $this->session->set_flashdata("pesan", "
<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Password tidak cocok! </div>
");
            redirect(base_url().'admin/form/add');
         }
        } else if ($mau_ke == "aksi_edit") {
			if ($PASSWORD_LAMA==$PASSWORD_ACC) {
                if ($PASSWORD==$PASSWORD2 ) {
          $data = array(
                'ID_ADMIN'       		=> $id_admin,
                'USERNAME' 		      	=> $username,
				'PASSWORD'     		  	=> $PASSWORD  
            );
            $this->madmin->get_update($id_admin,$data);
			$this->session->set_flashdata("pesan", "
<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>
");
			redirect('admin/ganti_password');
			} else {
            $this->session->set_flashdata("pesan", "
<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Password tidak cocok! </div>
");
			redirect(base_url().'admin/form/ganti_password/'.$id_admin);
			}
		 } else {
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Password lama salah! </div>");
            redirect(base_url().'admin/form/ganti_password/'.$id_admin);
            }   
		}

    }
    // fungsi detail
    public function detail($id){
        $data['title'] = 'Detail Admin'; //judul title
	    $data['qadmin'] = $this->madmin->get_admin_byid($id); //query model semua admin

		$this->load->view('admin/vdetadmin',$data);
    }

    // fungsi hapus
    public function hapus($gid){

        $this->madmin->del_admin($gid);
        $this->session->set_flashdata("pesan", "
<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Admin berhasil dihapus</div>
");
        redirect('admin');
	}
	
	// fungsi cari
	public function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->madmin->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['qadmin']=$cek->result();
            $this->load->view('admin/vadmin',$data);
        }else{
            $data['message']="
<div class='alert alert-success'>Data tidak ditemukan</div>
";
            $data['qadmin']=$cek->result();
            $this->load->view('admin/vadmin',$data);
        }
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */