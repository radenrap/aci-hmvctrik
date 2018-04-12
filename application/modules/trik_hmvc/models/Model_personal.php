<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_personal extends CI_Model {
	
	private $table = 'tb_personal';
//set column field database for datatable orderable
	private $column_order = array(null, 'name', 'position', 'office', 'age', 'start_date', 'salary');
//set column field database for datatable searchable
	private $column_search = array('name', 'position', 'office', 'age', 'start_date', 'salary');
//set default order
	private $order = array('id' => 'desc');

	public function __construct(){
		parent::__construct();
	}

	private function _get_query(){
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item) { 	// loop column 
			if ($_POST['search']['value']) {		// if datatable send POST for search
				if ($i===0) {						// first loop
					$this->db->group_start();		// open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']); 
				}else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) 	//last loop
					$this->db->group_end(); 				//close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])){ 				// here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_personal() {
		$this->_get_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		
		return $query->result();
	}

	public function count_filtered() {
		$this->_get_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all() {
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
/* End of file Model_data_table.php */
/* Location: ./application/modules/trik_hmvc/models/Model_data_table.php */