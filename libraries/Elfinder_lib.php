<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

	include_once 'assets/summernote-master/plugin/elFinder-2.1.23/php/elFinderConnector.class.php';
	include_once 'assets/summernote-master/plugin/elFinder-2.1.23/php/elFinder.class.php';
	include_once 'assets/summernote-master/plugin/elFinder-2.1.23/php/elFinderVolumeDriver.class.php';
	include_once 'assets/summernote-master/plugin/elFinder-2.1.23/php/elFinderVolumeLocalFileSystem.class.php';

class Elfinder_lib {
  public function __construct($opts) 
  {
  	
  	$opts['roots'][0]['accessControl'] =  function($attr, $path, $data, $volume) {
		return strpos(basename($path), '.') === 0    // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;  
  	};
  	
   	$opts['roots'][0]['uploadDeny']   = array('all');
  	$opts['roots'][0]['uploadAllow' ]  = array('image', 'text/plain');
  	$opts['roots'][0]['uploadOrder' ]  = array('deny', 'allow');

    $connector = new elFinderConnector(new elFinder($opts));
    $connector->run();
  }
}

?>
