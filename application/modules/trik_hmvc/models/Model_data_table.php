<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_table extends CI_Model {
	
	public function get_personal(){
		$query = "SELECT * FROM tb_personal ORDER BY id DESC";
		return $this->db->query($query)->result();
	}
	
}
/* End of file Model_data_table.php */
/* Location: ./application/modules/trik_hmvc/models/Model_data_table.php */