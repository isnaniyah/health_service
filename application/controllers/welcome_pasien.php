<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //Memanggil fungsi session Codeigniter
class Welcome_pasien extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('pasien/home', $data);
	 $this->load->view('pasien/dashboard', $data);
   }
   else
   {
     //Jika tidak ada session di kembalikan ke halaman login
     redirect('welcome_pasien/login_index', 'refresh');
   }
 }

 function login_index()
 {
   if($this->session->userdata('logged_in'))
   {
     redirect('welcome_pasien', 'refresh');
   }
   else 
   {
      $this->load->helper(array('form'));
      $this->load->view('pasien/welcome_message_pasien');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('welcome_pasien/login_index', 'refresh');
 }

}

?>


