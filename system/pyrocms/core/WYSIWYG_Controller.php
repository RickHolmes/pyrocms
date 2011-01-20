<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Shared logic and data for all CMS controllers
 *
 * @package		PyroCMS
 * @subpackage	Libraries
 * @category	Controller
 * @author		Phil Sturgeon
 */
class WYSIWYG_Controller extends MY_Controller
{
	function WYSIWYG_Controller()
	{
		parent::__construct();

	    // Not an admin and not allowed to see files
	    if($this->user->group !== 'admin' AND empty($this->permissions['files']))
	    {
			$this->load->language('files/files');
			show_error('files.no_permissions');
	    }

		$this->template
			->set_layout('wysiwyg', 'admin')
			->enable_parser(FALSE)

	    	->append_metadata(js('jquery/jquery.js'))
	    	->append_metadata('<script type="text/javascript">jQuery.noConflict();</script>')
	    	->append_metadata(js('jquery/jquery.livequery.js'))
	    	->append_metadata(js('jquery/jquery.fancybox.js'))
	    	->append_metadata(css('jquery/jquery.fancybox.css'))
				
			->set('editor_path', $editor_path = APPPATH_URI . 'assets/js/editor/');
	}
}