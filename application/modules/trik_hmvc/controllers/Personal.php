<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_personal');
	}
	
	public function index() {		
		$this->load->view('v_personal');
	}

	public function ajax_get_personal(){
		$list = $this->model_personal->get_personal();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $personal) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $personal->name;
			$row[] = $personal->position;
			$row[] = $personal->office;
			$row[] = $personal->age;
			$row[] = $personal->start_date;
			$row[] = $personal->salary;

			$data[] = $row;
		}

		$output = array(
			"draw"				=> $_POST['draw'],
			"recordsTotal"		=> $this->model_personal->count_all(),
			"recordsFiltered"	=> $this->model_personal->count_filtered(),
			"data"				=> $data,
		);
	//output to json format
		echo json_encode($output);
	}

}

/* End of file Data_table.php */
/* Location: ./application/modules/trik_hmvc/controllers/Personal.php */