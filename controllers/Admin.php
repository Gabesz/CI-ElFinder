<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  	
	public function __construct()
	{
		parent::__construct();
	}
  
  	public function elfinder_init()
	{
		$this->load->helper('path');
		$hash = $volumeId . rtrim(strtr(base64_encode($path), '+/=', '-_.'), '.');
		  $opts = array(
		    'debug' => true, 
		    'roots' => array(
		      array( 
		        'driver' => 'LocalFileSystem', 
		        'path'   => set_realpath('uploads'), 
        		'URL'    => site_url('uploads') . '/', 
		      ) 
		    )
		  );
		$this->load->library('elfinder_lib', $opts);
	
	}
  
  
}
