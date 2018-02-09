<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	/*****
     | CRUD pekerjaan
     | controller pekerjaan view, create, update, delete
     | by g2tech
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('mpekerjaan');
        $this->load->helper('form','url');
    }

	public function index()
	{
	    $jumlah= $this->mpekerjaan->jumlah();
		$config['base_url'] = base_url().'index.php/pekerjaan/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 		
 
		
		$dari = $this->uri->segment('3');
		$data['qpekerjaan'] = $this->mpekerjaan->lihat($config['per_page'],$dari);
		$this->pagination->initialize($config); 
		$this->load->view('pekerjaan/vpekerjaan',$data);
	}

    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$id_pekerjaan     					= addslashes($this->input->post('ID_PEKERJAAN'));
		$nama_pekerjaan						= addslashes($this->input->post('NAMA_PEKERJAAN'));
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Pekerjaan';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('pekerjaan/vformpekerjaan',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mpekerjaan->get_pekerjaan_byid($idu);
			$data['title'] = 'Edit Pekerjaan';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('pekerjaan/vformpekerjaan',$data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'ID_PEKERJAAN'      	    	=> $id_pekerjaan,
				'NAMA_PEKERJAAN'	            => $nama_pekerjaan 
            );
            $this->mpekerjaan->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('pekerjaan');
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_PEKERJAAN'          		=> $id_pekerjaan,
				'NAMA_PEKERJAAN'	            => $nama_pekerjaan             
            );
            $this->mpekerjaan->get_update($id_pekerjaan,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('pekerjaan');
		}

    }
    // fungsi hapus
    public function hapus($gid){

        $this->mpekerjaan->del_pekerjaan($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Pekerjaan berhasil dihapus</div>");
        redirect('pekerjaan');
	}
	
	// fungsi cari
	public function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->mpekerjaan->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['qpekerjaan']=$cek->result();
            $this->load->view('pekerjaan/vpekerjaan',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['qpekerjaan']=$cek->result();
            $this->load->view('pekerjaan/vpekerjaan',$data);
        }
    }
}

/* End of file pekerjaan.php */
/* Location: ./application/controllers/pekerjaan.php */