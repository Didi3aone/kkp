<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//check login user
		if($this->session->userdata(IS_LOGIN) == FALSE) {
			redirect('Auth?login(FALSE)&'.URL_HACKED.'&'.URL_ENCODE,'refresh');
		}
	}

	/**
	 *  all report
	 */
	public function index()
	{
		$header = array(
			"TITLE_TAB" 		=> "Report",
			"menu_breadcrumb"	=> "Report",
			"active_page"		=> "report_list"
		);

		$data['title_table'] = "Reporting ";

		$footer = array(
			"script" => array(
				"assets/plugins/datatables/jquery.dataTables.min.js",
				"assets/material/js/table.js"
			),
			"script_bottom" => array(
				"report/index_js"
			)
		);

		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("report/index", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);
	}

	public function export() 
	{
		$start_date = $this->input->get('start');
		$end_date   = $this->input->get('end');
		$report  = $this->db->
			select('*')->
			from('tbl_work_order')->
			where('DATE(WorkOrderDate) >=', $start_date)->
			where('DATE(WorkOrderDate) <=', $end_date)->
			where('WOrkOrderStatus', 3)->
			get()->result();
			// echo $this->db->last_query();
		$data['report'] = $report;

		$this->load->view('report/export', $data, FALSE);
	}
}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */