<?php
class Mregister extends CI_Model {

    var $tabel = 'pasien';
	private $table="pasien";
    private $primary="NIK_PASIEN";

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }
}
?>
