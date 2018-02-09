<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poli extends CI_Controller {

	/*****
     | CRUD poli
     | controller poli view, create, update, delete
     | by g2tech
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('mpoli');
        $this->load->helper('form','url');
    }

	public function index()
	{
	    $jumlah= $this->mpoli->jumlah();
		$config['base_url'] = base_url().'index.php/poli/index/';
 
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 		
 
		
		$dari = $this->uri->segment('3');
		$data['qpoli'] = $this->mpoli->lihat($config['per_page'],$dari);
		$this->pagination->initialize($config); 
		$this->load->view('poli/vpoli',$data);

	}

    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$id_poli     					= addslashes($this->input->post('ID_POLI'));
		$nama_poli						= addslashes($this->input->post('NAMA_POLI'));
		
		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Poli';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('poli/vformpoli',$data);
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mpoli->get_poli_byid($idu);
			$data['title'] = 'Edit Poli';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('poli/vformpoli',$data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'ID_POLI'      		=> $id_poli,
				'NAMA_POLI'         => $nama_poli 
            );
            $this->mpoli->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('poli');
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_POLI'      		=> $id_poli,
				'NAMA_POLI'         => $nama_poli             
            );
            $this->mpoli->get_update($id_poli,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('poli');
		}

    }
    // fungsi hapus
    public function hapus($gid){

        $this->mpoli->del_poli($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Poli berhasil dihapus</div>");
        redirect('poli');
	}
	
	// fungsi cari
	public function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->mpoli->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['qpoli']=$cek->result();
            $this->load->view('poli/vpoli',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['qpoli']=$cek->result();
            $this->load->view('poli/vpoli',$data);
        }
    }
}

/* End of file poli.php */
/* Location: ./application/controllers/poli.php */