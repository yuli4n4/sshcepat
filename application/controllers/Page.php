<?php
class Page extends CI_Controller {

	public function setProp() {
                $data['title'] = 'Free SSH Account';
                $data['brand'] = 'SSHCepat';

                return $data;
        }

	public function __construct() {

		parent::__construct();

		$this->load->model('WebApi');
		$this->load->helper('url_helper');

	}
	public function index() {
		$continent['benua'] = $this->WebApi->get_continent();
		$this->load->view('bootstrap/header', $this->setProp());
		$this->load->view('index', $continent);
		$this->load->view('bootstrap/footer');
	}
	public function continent($benua){
		$this->load->view('bootstrap/header', $this->setProp());
		$continent['benua'] = $this->WebApi->get_country($benua);
		$this->load->view('country', $continent);
                $this->load->view('bootstrap/footer');
	}

}
