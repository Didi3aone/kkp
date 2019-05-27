<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $_table 	= "tbl_user";
	private $_tbl_alias = "tu";
	private $_pk_field  = "user_id";

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * function mode = select, insert, update, delete
	 * @author : didi
	 * @return all method type
	 */
	public function mode($params = array())
	{
		if( isset($params['methode_type']) && $params['methode_type'] == "all_data" ) {
			$this->db->select($params['select']);
			$this->db->from($this->_table." ".$this->_tbl_alias);

			if( isset($params['joined']) && ($params['joined']) != null)
			{
				foreach($params['joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)]);
				}
			}

			if( isset($params['conditions']) ){
				$this->db->where($params['conditions']);
			}

			$result = $this->db->get()->result_array();

			if( isset($params['debug_query']) && $params['debug_query'] == true) {
				echo "<pre>".print_r($this->db->last_query())."</pre>";exit;
			}
		} else if(isset($params['methode_type']) && $params['methode_type'] == "single_row") {
			$this->db->select($params['select']);
			$this->db->from($this->_table." ".$this->_tbl_alias);
			if( isset($params['joined']) && ($params['joined']) != null)
			{
				foreach($params['joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)]);
				}
			}
			if( isset($params['conditions']) ){
				$this->db->where($params['conditions']);
			}

			$result = $this->db->get()->row_array();
			if( isset($params['debug_query']) && $params['debug_query'] == true) {
				echo "<pre>".print_r($this->db->last_query())."</pre>";exit;
			}
		} else if( isset($params['methode_type']) && $params['methode_type'] == "insert") {
			$result = $this->db->insert($this->_table, $params['datas']);
			return $this->db->insert_id();
		} else if( isset($params['methode_type']) && $params['methode_type'] == "update") {
			$result = $this->db->update($this->_table, $params['datas'], $params['conditions']);
		} else {
			if( isset($params['methode_type']) && $params['methode_type'] == "delete") {
				$this->db->update($this->_table, $params['datas'], $params['conditions']);
			}
		}

		return $result;
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */