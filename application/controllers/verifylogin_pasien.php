<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin_pasien extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('muser_pasien','',TRUE);
 }

 function index()
 {
   //Aksi untuk melakukan validasi
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Jika validasi gagal user akan diarahkan kembali ke halaman login
    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Username dan Password tidak valid!</div>");
    $this->load->view('pasien/welcome_message_pasien');
   }
   else
   {
     //Jika berhasil user akan di arahkan ke private area 
     redirect('welcome_pasien', 'refresh');
   }

 }

 function check_database($password)
 {
   //validasi field terhadap database 
   $username = $this->input->post('username');

   //query ke database
   $result = $this->muser_pasien->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'nik_pasien' => $row->NIK_PASIEN,
         'username' => $row->USERNAME
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
