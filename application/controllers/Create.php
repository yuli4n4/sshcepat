<?php
class Create extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url_helper');
	}
	public function ssh($benua, $negara) {
		echo $benua;
		echo $negara;
	}
}
