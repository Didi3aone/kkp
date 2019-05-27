<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_order extends CI_Controller {

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
		$this->load->model('Work_order_model');

		$header = array(
			"TITLE_TAB" 		=> "WORK ORDER",
			"menu_breadcrumb"	=> "Work Order",
			"active_page"		=> "work_list"
		);

		$conditions = array();
		if( $this->session->userdata("level") == "Leader Produksi") {
			$conditions = array("WorkOrderStatus IN(1,2,3) " => NULL);
		} elseif( $this->session->userdata("level") == "Manager Produksi") {
			$conditions = array("WorkOrderStatus IN(3) " => NULL);
		}

		$data['data'] = $this->Work_order_model->mode(array(
			"methode_type" => "all_data",
			"conditions"   => $conditions
		));

		$data['title_table'] = "Work Order List";

		$footer = array(
			"script" => array(
				"assets/plugins/datatables/jquery.dataTables.min.js",
				"assets/material/js/table.js"
			),
			"script_bottom" => array(
				"wo/index_js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("wo/index", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);
	}

	/**
	 *  create wo
	 */
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
		$this->load->view("wo/create", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);	
	}

	/**
	 *  edit wo
	 */
	public function edit( $id = null)
	{
		$this->load->model('Work_order_model');
		$header = array(
			"TITLE_TAB" 		=> "WORK ORDER",
			"menu_breadcrumb"	=> "Work Order",
			"active_page"		=> "work_create"
		);

		$data['title_form'] = "Edit WO";

		$data['datas'] 		= $this->Work_order_model->mode(array(
			"methode_type" => "single_row",
			"conditions"   => array("WorkOrderId" => $id),
			"debug"		   => false
		)); 

		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("wo/create", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);	
	}
	
	/**
	 *  proses wo
	 */
	public function prosses_wo( $id = null)
	{
		$this->load->model('Work_order_model');
		$header = array(
			"TITLE_TAB" 		=> "WORK ORDER",
			"menu_breadcrumb"	=> "Work Order",
			"active_page"		=> "work_create"
		);

		$data['title_form'] = "Edit WO";

		$data['datas'] 		= $this->Work_order_model->mode(array(
			"methode_type" => "single_row",
			"conditions"   => array("WorkOrderId" => $id),
			"debug"		   => false
		)); 

		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("wo/create", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);	
	}

	/**
	 *  process save to db
	 */
	public function process_form()
	{
		$this->load->model("Work_order_model");

		$this->load->library("form_validation");

		$this->form_validation->set_rules("nama","Work Order Name", "trim|required");

		$id    = $this->input->post('id');
		$nama  = $this->input->post('nama');
		$batch  = $this->input->post('batch');
		$qty   = $this->input->post('qty');
		$total = $this->input->post('total');
		$kadar = $this->input->post('kadar');
		$desc  = $this->input->post('desc');

		if( $this->form_validation->run() == FALSE ) 
		{
			$this->session->set_flashdata("error_message", validation_errors());
			redirect('Work_order/create','refresh');
		} else {

			$_save_data = array(
				"WorkOrderName"     	=> $nama,
				"WorkOrderNoBatch"     	=> $batch,
				"WorkOrderQty"      	=> $qty,
				"WorkOrderTotalBed" 	=> $total,
				"WorkOrderKadar"    	=> $kadar,
				"WorkOrderDescription"  => $desc
 			);
 			if($id == "") {
			// print_r($this->input->post());exit;

 				$_save_data['WorkOrderDate'] = date('Y-m-d H:i:s');

 			 	$this->Work_order_model->mode(array(
 			 		"methode_type" => "insert",
 			 		"datas"  	   => $_save_data
 			 	));
 				// print_r($result);exit();
				$this->session->set_flashdata("success_message", "Tambah data");
				redirect('work_order','refresh');

 			} else {

 				//update 
 				$conditions = array("WorkOrderId" => $id);

 				$_save_data['WorkOrderUpdated'] = date("Y-m-d H:i:s");

 				$result = $this->Work_order_model->mode(array(
					"methode_type" 	=> "update",
					"datas" 		=> $_save_data,
					"conditions"	=> $conditions
				));

				$this->session->set_flashdata("success_message", "Success update data");

				redirect('work_order','refresh');
 			}
		}
		$this->session->set_flashdata("error_message", "Terjadi kesalahan save data");
	}

	/**
	 * proses send wo ke gudang
	 * ajax proses
	 */
	public function sent_to_produksi()
	{
		$this->load->model("Work_order_model");

		$message['is_error'] = true;
		$message['message']	 = "";

		$id = $this->input->post('id');

		if(!empty($id)) { 
			$_update_db = array(
				"WorkOrderStatus" => 1
			);

			$result = $this->Work_order_model->mode(array(
				"methode_type" 	=> "update",
				"datas" 		=> $_update_db,
				"conditions"	=> array("WorkOrderId" => $id)
			));

			if( $result )
			{
				$message['is_error'] = false;
				$message['message']	 = "Wo telah terkirim pada bagian produksi";
			} else {
				$message['is_error'] = true;
				$message['message']	 = "Failed send WO";
 			}
		} 

		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}

	/**
	 *  create wo
	 */
	public function print($id = null)
	{
		$header = array(
			"TITLE_TAB" 		=> "Print WO",
		);

		$data['title_form'] = "Create WO";

		$data['print_data'] = $this->db->select("") ->
								select('*')->
								from("tbl_work_order")->
								where("WorkOrderId", $id)->
								get()->row();
		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view("wo/print", $data);
	}
}

/* End of file Work_order.php */
/* Location: ./application/controllers/Work_order.php */