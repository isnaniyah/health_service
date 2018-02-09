<?php
Class Muser_pasien extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('NIK_PASIEN, USERNAME, PASSWORD');
   $this -> db -> from('pasien');
   $this -> db -> where('USERNAME', $username);
   $this -> db -> where('PASSWORD', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>



