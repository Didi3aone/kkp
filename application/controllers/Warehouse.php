<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//check login user
		if($this->session->userdata(IS_LOGIN) == FALSE) {
			redirect('Auth?login(FALSE)&'.URL_HACKED.'&'.URL_ENCODE,'refresh');
		}
	}

	/**
	 *  list all work order
	 */
	public function index()
	{
		$this->load->model('Warehouse_model');

		$header = array(
			"TITLE_TAB" 		=> "WAREHOUSE",
			"menu_breadcrumb"	=> "Warehouse",
			"active_page"		=> "warehouse_list"
		);

		$data['data'] = $this->Warehouse_model->mode(array(
			"methode_type" => "all_data"
		));

		$data['title_table'] = "Warehouse List";

		$footer = array(
			"script" => array(
				"assets/plugins/datatables/jquery.dataTables.min.js",
				"assets/material/js/table.js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("warehouse/index", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);
	}

	public function create()
	{
		$header = array(
			"TITLE_TAB" 		=> "WORK ORDER",
			"menu_breadcrumb"	=> "Work Order",
			"active_page"		=> "work_create"
		);

		$data['title_form'] = "Create WO";

		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("warehouse/create", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);	
	}

	/**
	 *  process save to db
	 */
	public function process_form()
	{
		$this->load->model("Warehouse_model");

		$this->load->library("form_validation");

		$this->form_validation->set_rules("nama","Warehouse Name", "trim|required");

		$id    = $this->input->post('id');
		$nama  = $this->input->post('nama');
		$desc  = $this->input->post('desc');

		if( $this->form_validation->run() == FALSE ) 
		{
			$this->session->set_flashdata("error_message", validation_errors());
			redirect('Work_order/create','refresh');
		} else {

			$_save_data = array(
				"warehouse_name" 		=> $nama,
				"warehouse_description" => $desc
 			);
			// print_r($this->input->post());exit;
 			if($id == "") {

 			 	$this->Warehouse_model->mode(array(
 			 		"methode_type" => "insert",
 			 		"datas"  	   => $_save_data
 			 	));
 				// print_r($result);exit();
				$this->session->set_flashdata("success_message", "Success add data");
				redirect('work_order','refresh');

 			} else {

 				//update 
 				$conditions = array("WorkOrderId" => $id);

 				$_save_data['WorkOrderUpdated'] = date("Y-m-d H:i:s");

 				$result = $this->db->update($data);
				$this->session->set_flashdata("success_message", "Success update data");

				redirect('work_order','refresh');
 			}
		}
		$this->session->set_flashdata("error_message", "Terjadi kesalahan save data");
	}
}

/* End of file Warehouse.php */
/* Location: ./application/controllers/Warehouse.php */