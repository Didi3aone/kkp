<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * function login 
	 * load ui login
	 */
	public function index()
	{
		// echo "tes";
		$data = array(
			"TITLE_TAB" => "USER LOGIN",
			"TITLE"     => "SIGN IN",
		);

		$this->load->view(LAYOUT_HEADER_SIGN, $data, FALSE);
		$this->load->view("login/index", $data, FALSE);
		$this->load->view(LAYOUT_FOOTER_SIGN, $data, FALSE);
	}

	/**
	 * ajax proses post 
	 * @author didi
	 * @return json post
	 */
	public function proses_login()
	{
		//initials
		$message['is_error'] = true;
		$message['message']  = "";
		$message['redirect'] = "";

		//load model and form validation
		$this->load->model('User_model');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if( $this->form_validation->run() == FALSE ) {
			$message['is_error'] = true;
			$message['message']  = "username dan password harus diisi !!!";
		} else {
			//get parameter post 
			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));

			//cek in database 
			$check_login = $this->User_model->mode(array(
				"methode_type" => "single_row",
				"select"       => "*",
				"joined"	   => array(
					"tbl_user_role tur" => array(
						"tur.RoleId" => "tu.UserRoleId"
					)
				),
				"conditions"   => array(
					"UserName" 	 => $username,
					"UserPassword"  => $password
				),
				"debug_query"	=> false
			));

			//if true and false set conditions
			if( !empty($check_login) ) {

				$row = $check_login;

				$sess_data = array(
					"IS_LOGIN" => TRUE,
					"name"	   => $row['UserName'],
					"fullname" => $row['UserFullName'],
					"level"	   => $row['RoleName'],
					"id"	   => $row['UserId']
				);

				//set session
				$this->session->set_userdata($sess_data);

				//set alert message
				$message['is_error'] = false;
				$message['message']  = "Success Login";
				$message['redirect'] = site_url('dashboard?LOGIN(TRUE)&name='.URL_HACKED.'&'.URL_ENCODE);
			} else {
				$message['is_error'] = true;
				$message['message']  = "Username atau password salah";
				$message['redirect'] = "";
			}
		}
		//set output json
		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}

	/**
	 *  funcion logout
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth?Login(FALSE)&'.URL_HACKED.'&'.URL_ENCODE,'refresh');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */