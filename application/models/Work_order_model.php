<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_order_model extends CI_Model {

	private $_table 	= "tbl_work_order";
	private $_tbl_alias = "two";
	private $_pk_field  = "WorkOrderId";

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * function mode = select, insert, update, delete
	 * one function for all methode 
	 * @author : didi
	 * @return all method type
	 * @since version 1.0.2 2019
	 */
	public function mode($params = array())
	{
		// print_r($params);exit();
		$result = array();
		if( isset($params['methode_type']) && $params['methode_type'] == "all_data" ) {
			
			if(isset($params['select'])) {
				$select = $params['select'];
			} else {
				$select = "*";
			}

			$this->db->select($select);
			$this->db->from($this->_table." ".$this->_tbl_alias);

			if( isset($params['joined']) && ($params['joined']) != null)
			{
				foreach($params['joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)]);
				}
			}

			if( isset($params['left_joined']) && ($params['left_joined']) != null)
			{
				foreach($params['left_joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."left");
				}
			}

			if( isset($params['conditions']) ){
				$this->db->where($params['conditions']);
			}	

			if(isset($params['filter']) && $params['filter'] != "" && is_array($params['filter']) )
			{
				foreach($params['filter'] as $key => $val) {
					$this->db->like($key, $val);
				}
			}

			if(isset($params['order_by']) && $params['order_by'] != "") 
			{
				$this->db->order_by($params['order_by'], 'desc');
			}

			if( isset($params['group_by']) && $params['group_by'] != "") 
			{
				$this->db->group_by($params['group_by']);
			}


			(isset($params['limit'])) ? $limit = $params['limit'] : "";
			(isset($params['start'])) ? $start = $params['start'] : "";

			if(isset($params['limit']) && isset($params['start'])) {
				$this->db->limit($params['limit'], $params['start']);
			}

			$result = $this->db->get()->result_array();

			//debug query
			if( isset($params['debug_query']) && $params['debug_query'] == true) {
				echo "<pre>".print_r($this->db->last_query())."</pre>";exit;
			}
		} else if(isset($params['methode_type']) && $params['methode_type'] == "single_row") {
			if(isset($params['select'])) {
				$select = $params['select'];
			} else {
				$select = "*";
			}
			$this->db->select($select);
			$this->db->from($this->_table." ".$this->_tbl_alias);
			if( isset($params['joined']) && ($params['joined']) != null)
			{
				foreach($params['joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)]);
				}
			}

			if( isset($params['left_joined']) && ($params['left_joined']) != null)
			{
				foreach($params['left_joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."left");
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
			// echo "true";exit();	
			// print_r($params);
		 	$this->db->insert($this->_table, $params['datas']);
			return $this->db->insert_id();
		} else if( isset($params['methode_type']) && $params['methode_type'] == "update") {
			$result = $this->db->update($this->_table, $params['datas'], $params['conditions']);
		} 

		return $result;
	}	
}

/* End of file Work_order_model.php */
/* Location: ./application/models/Work_order_model.php */