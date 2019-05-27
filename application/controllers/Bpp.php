<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpp extends CI_Controller {

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
		$this->load->model('Bpp_model');

		$header = array(
			"TITLE_TAB" 		=> "BPP",
			"menu_breadcrumb"	=> "Bpp",
			"active_page"		=> "bpp_list"
		);

		$conditions = array();
		if( $this->session->userdata("level") == "QC") {
			$conditions = array("bpp_status IN(3,4,5) " => NULL);
		} else if($this->session->userdata("level") == "Staff Gudang") {
			$conditions = array();
		}

		$data['data'] = $this->Bpp_model->mode(array(
			"methode_type" => "all_data",
			"conditions"   => $conditions
		));

		$data['title_table'] = "Bpp List";

		$footer = array(
			"script" => array(
				"assets/plugins/datatables/jquery.dataTables.min.js",
				"assets/material/js/table.js"
			),
			"script_bottom" => array(
				"bpp/index_js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("bpp/index", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);
	}

	/**
	 *  proses wo
	 */
	public function create( $id = null)
	{
		$this->load->model(array('Bpp_model','Work_order_model'));
		$header = array(
			"TITLE_TAB" 		=> "Create BPP",
			"menu_breadcrumb"	=> "BPP",
			"active_page"		=> "work_create"
		); 

		$data['title_form'] = "Create BPP";
		$data['view_type']  = "create";

		$data['id_wo'] 		= $this->Work_order_model->mode(array(
			"methode_type" 	=> "single_row",
			"conditions"   	=> array("WorkOrderId" => $id),
			"debug_query"	=> false
		)); 

		// print_r($data['id_wo']);exit;

		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("bpp/create", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);	
	}

	/**
	 *  proses wo
	 */
	public function view( $id = null)
	{
		$this->load->model(array('Bpp_model','Work_order_model'));
		$header = array(
			"TITLE_TAB" 		=> "View BPP",
			"menu_breadcrumb"	=> "BPP",
			"active_page"		=> "bpp_view"
		);

		$data['view_type']  = "view";
		$data['title_form'] = "View BPP";

		$data['datas'] 		= $this->Bpp_model->mode(array(
			"methode_type" 	=> "single_row",
			"conditions"   	=> array("bpp_id" => $id),
			"debug_query"	=> false
		)); 

		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			),
			"script_bottom" => array(
				"bpp/create_js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("bpp/create", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);	
	}

	/**
	 *  process save to db
	 */
	public function process_form()
	{
		$this->load->model(array("Bpp_model","Work_order_model"));

		$this->load->library("form_validation");

		$this->form_validation->set_rules("bahan","Bahan", "trim|required");

		$id_wo = $this->input->post('id_wo');
		$id    = $this->input->post('id');
		$nama  = $this->input->post('bahan');
		$qty   = $this->input->post('qty');
		$kadar = $this->input->post('kadar');
		$desc  = $this->input->post('desc');
		if( $this->form_validation->run() == FALSE ) 
		{
			$this->session->set_flashdata("error_message", validation_errors());
			redirect('Work_order/create','refresh');
		} else {

			$_save_data = array(
				"bpp_bahan"     => $nama,
				"bpp_qty"      	=> $qty,
				"bpp_kadar" 	=> $kadar,
				"bpp_wo_id"		=> $id_wo,
				"bpp_remark"	=> $desc
 			);
			// print_r($this->input->post());exit;
 			if($id == "") {

 				$_save_data['bpp_created_date'] = date('Y-m-d H:i:s');

 			 	$result = $this->Bpp_model->mode(array(
 			 		"methode_type" => "insert",
 			 		"datas"  	   => $_save_data
 			 	));

 			 	if( $result )
 			 	{
 			 		$this->Work_order_model->mode(array(
	 			 		"methode_type" => "update",
	 			 		"datas"  	   => array("WorkOrderStatus" => 2),
	 			 		"conditions"   => array("WorkOrderId" => $id_wo)
	 			 	));
	 			 	// echo $this->db->last_query();exit();
 			 	}
 				// print_r($result);exit();
				$this->session->set_flashdata("success_message", "Buat BPP");
				redirect('work_order','refresh');

 			} else {

 				//update 
 				$conditions = array("WorkOrderId" => $id);

 				$_save_data['bpp_updated_date'] = date("Y-m-d H:i:s");

 				$result = $this->Bpp_model->mode(array(
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
	 * proses send qc ke gudang
	 * ajax proses
	 */
	public function sent_to_qc()
	{
		$this->load->model("Bpp_model");

		$message['is_error'] = true;
		$message['message']	 = "";

		$id = $this->input->post('id');

		if(!empty($id)) { 
			$_update_db = array(
				"bpp_status" => 3
			);

			$result = $this->Bpp_model->mode(array(
				"methode_type" 	=> "update",
				"datas" 		=> $_update_db,
				"conditions"	=> array("bpp_id" => $id)
			));

			if( $result )
			{
				$message['is_error'] = false;
				$message['message']	 = "Kirim BPP";
			} else {
				$message['is_error'] = true;
				$message['message']	 = "Failed send BPP";
 			}
		} 

		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}

	/**
	 * proses send bpp ke gudang
	 * ajax proses
	 */
	public function process_bpp()
	{
		$this->load->model("Bpp_model");

		$message['is_error'] = true;
		$message['message']	 = "";

		$id = $this->input->post('id');

		if(!empty($id)) { 
			$_update_db = array(
				"bpp_status" => 2
			);

			$result = $this->Bpp_model->mode(array(
				"methode_type" 	=> "update",
				"datas" 		=> $_update_db,
				"conditions"	=> array("bpp_id" => $id)
			));

			if( $result )
			{
				$message['is_error'] = false;
				$message['message']	 = "Proses BPP";
			} else {
				$message['is_error'] = true;
				$message['message']	 = "Failed process BPP";
 			}
		} 

		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}

	/**
	 * proses approved qc
	 * ajax proses
	 */
	public function approved_qc()
	{
		$this->load->model(array("Bpp_model","Work_order_model"));

		$message['is_error'] = true;
		$message['message']	 = "";

		$id = $this->input->post('id');

		if(!empty($id)) { 
			$_update_db = array(
				"bpp_status" => 4
			);

			$result = $this->Bpp_model->mode(array(
				"methode_type" 	=> "update",
				"datas" 		=> $_update_db,
				"conditions"	=> array("bpp_id" => $id)
			));

			$wo_id = $this->Bpp_model->mode(array(
				"methode_type" => "single_row",
				"conditions"   => array("bpp_id" => $id)
			));

			$this->Work_order_model->mode(array(
				"methode_type" => "update",
				"datas"		   => array("WorkOrderStatus" => 3),
				"conditions"   => array("WorkOrderId" => $wo_id['bpp_wo_id'])
			));

			if( $result )
			{
				$message['is_error'] = false;
				$message['message']	 = "Product Approved";
			} else {
				$message['is_error'] = true;
				$message['message']	 = "error";
 			}
		} 

		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}

	/**
	* proses reject qc
	*/
	public function rejected_qc()
	{
		$this->load->model(array("Bpp_model","Work_order_model"));

		$message['is_error'] = true;
		$message['message']	 = "";

		$id = $this->input->post('id');

		if(!empty($id)) { 
			$_update_db = array(
				"bpp_status" => 5
			);

			$result = $this->Bpp_model->mode(array(
				"methode_type" 	=> "update",
				"datas" 		=> $_update_db,
				"conditions"	=> array("bpp_id" => $id)
			));

			$wo_id = $this->Bpp_model->mode(array(
				"methode_type" => "single_row",
				"conditions"   => array("bpp_id" => $id)
			));

			$this->Work_order_model->mode(array(
				"methode_type" => "update",
				"datas"		   => array("WorkOrderStatus" => 4),
				"conditions"   => array("WorkOrderId" => $wo_id['bpp_wo_id'])
			));

			if( $result )
			{
				$message['is_error'] = false;
				$message['message']	 = "Product Rejected";
			} else {
				$message['is_error'] = true;
				$message['message']	 = "Failed send BPP";
 			}
		} 

		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}

	public function print($id = null)
	{
		$header = array(
			"TITLE_TAB" 		=> "Print WO",
		);

		$data['title_form'] = "Create WO";

		$data['print_data'] = $this->db->select("") ->
								select('*')->
								from("tbl_bpp")->
								where("bpp_id", $id)->
								get()->row();
		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view("bpp/print", $data);
	}

	public function print_report($id = null)
	{
		$header = array(
			"TITLE_TAB" 		=> "Print WO",
		);

		$data['title_form'] = "Create WO";

		$data['print_data'] = $this->db->select("") ->
								select('*')->
								from("tbl_bpp")->
								join("tbl_work_order","tbl_work_order.WorkOrderId = tbl_bpp.bpp_wo_id")->
								where("bpp_id", $id)->
								get()->row();
		$footer = array(
			"script" => array(
				"assets/material/js/validation.js"
			)
		);

		$this->load->view("bpp/print-done", $data);
	}
}

/* End of file Bpp.php */
/* Location: ./application/controllers/Bpp.php */