<?php
/**
 * CodeIgniter
 *
 * @package snippet parse
 * @author  didi triawan
 * @copyright   Copyright (c) 2019
 * @license http://opensource.org/licenses/MIT  MIT License
 * @since   Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
// ------------------------------------------------------------------------

class Parse_class_fake
{
	function load_template_parse($data = array())
	{	
		$config['PLUGIN_CSS'] = "";
		if(	!empty($data['PLUGIN_CSS']) )
		{
			foreach($data['PLUGIN_CSS'] as $val)
			{
				$config['PLUGIN_CSS'] = $val;
			}
		}

		$CONFIG['BASE_URL'] = "";
		if( !empty($data['BASE_URL']) )
		{
			$CONFIG['BASE_URL'] = $data['BASE_URL'];
		} else {
			$CONFIG['BASE_URL'] = base_url();
		}

		$CONFIG['CONTENT_MENU'] = $data['CONTENT_MENU'];

		$CONFIG['HEADER_LOGIN'] = "layout/header_sign";
		$CONFIG['FOOTER_LOGIN'] = "layout/footer_sign";
 		$this->parser->parse($CONFIG);
	}
}