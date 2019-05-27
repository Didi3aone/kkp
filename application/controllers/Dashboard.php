<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//check login user
		if($this->session->userdata(IS_LOGIN) == FALSE) {
			redirect('Auth?login(FALSE)&'.URL_HACKED.'&'.URL_ENCODE,'refresh');
		}
	}

	/**
	 * function index
	 * load the ui dashboard
	 */
	public function index()
	{
		$header = array(
			"TITLE_TAB" 	  => "DASHBOARD",
			"menu_breadcrumb" => "Dashboard",
			"active_page"	  => "dashboard"
		);

		$data = array();
		$footer = array();
		$this->load->view(LAYOUT_HEADER, $header);
		$this->load->view("dashboard/index", $data);
		$this->load->view(LAYOUT_FOOTER, $footer);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */