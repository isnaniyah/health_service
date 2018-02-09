<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //Memanggil fungsi session Codeigniter
class Welcome extends CI_Controller {

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
     $this->load->view('home', $data);
	 $this->load->view('dashboard', $data);
   }
   else
   {
     //Jika tidak ada session di kembalikan ke halaman login
     redirect('welcome/login_index', 'refresh');
   }
 }

 function login_index()
 {
   if($this->session->userdata('logged_in'))
   {
     redirect('welcome', 'refresh');
   }
   else 
   {
      $this->load->helper(array('form'));
      $this->load->view('welcome_message');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('welcome/login_index', 'refresh');
 }

}

?>


