<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//check login user
		if($this->session->userdata(IS_LOGIN) == FALSE) {
			redirect('Auth?login(FALSE)&'.URL_HACKED.'&'.URL_ENCODE,'refresh');
		}
	}

	/**
	 *  list all material
	 */
	public function index()
	{
		$this->load->model('Material_model');

		$header = array(
			"TITLE_TAB" 		=> "MATERIAL",
			"menu_breadcrumb"	=> "Material",
			"active_page"		=> "material_list"
		);

		$data['data'] = $this->Material_model->mode(array(
			"methode_type" => "all_data"
		));

		// print_r($data['data']);exit;

		$data['title_table'] = "Material List";

		$footer = array(
			"script" => array(
				"assets/plugins/datatables/jquery.dataTables.min.js",
				"assets/material/js/table.js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("material/index", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);
	}

	public function create()
	{
		$header = array(
			"TITLE_TAB" 		=> "MATERIAL",
			"menu_breadcrumb"	=> "Material",
			"active_page"		=> "material_create"
		);

		$data['title_form'] = "Create Material";

		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("material/create", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);	
	}

	/**
	 *  process save to db
	 */
	public function process_form()
	{
		$this->load->model("Material_model");

		$this->load->library("form_validation");

		$this->form_validation->set_rules("kode","Kode Material", "trim|required");
		$this->form_validation->set_rules("nama","Nama Material", "trim|required");

		$id    = $this->input->post('id');
		$kode  = $this->input->post('kode');
		$nama  = $this->input->post('nama');
		$desc  = $this->input->post('desc');
		$state = $this->input->post('status');

		if( $this->form_validation->run() == FALSE ) 
		{
			$this->session->set_flashdata("error_message", validation_errors());
			redirect('material/create','refresh');
		} else {

			$_save_data = array(
				"material_code"	 		=> $kode,
				"material_name" 		=> $nama,
				"material_description"  => $desc
 			);

 			if($this->session->userdata("role_name") == "QC"){
 				$_save_data['material_check_qc'] = $state;
 			}
			// print_r($this->input->post());exit;
 			if($id == "") {

 				$_save_data['material_created_date'] = date('Y-m-d H:i:S');

 			 	$this->Material_model->mode(array(
 			 		"methode_type" => "insert",
 			 		"datas"  	   => $_save_data
 			 	));

 				// print_r($result);exit();
				$this->session->set_flashdata("success_message", "Success add data");
				redirect('material','refresh');

 			} else {

 				//update 
 				$conditions = array("material_id" => $id);

 				$_save_data['material_updated_date'] = date("Y-m-d H:i:s");

 				$result = $this->db->update($data);
				$this->session->set_flashdata("success_message", "Success update data");

				redirect('material','refresh');
 			}
		}
		$this->session->set_flashdata("error_message", "Terjadi kesalahan save data");
	}
}

/* End of file Material.php */
/* Location: ./application/controllers/Material.php */