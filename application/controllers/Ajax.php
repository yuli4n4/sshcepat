<?php
class Ajax extends CI_Controller {

	private $username, $password, $limit;

        public function __construct()
        {
		parent::__construct();

                $this->load->model('WebApi');
                $this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->library('sshcepat');
        }
	public function ajax_post()
	{

		if(isset($_POST))
		{
			if (empty($_POST['username'])){
				$this->session->set_flashdata('Username', 'Username is empty!!');
			}
			if (empty($_POST['password'])){
				$this->session->set_flashdata('Password', 'Password is empty!!');
			}
			if (count($this->session->flashdata()) > 0) {
				if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
					echo json_encode(array('status'=>'Failed', 'result'=> $this->session->flashdata()));
					exit;
				}
				show_404();
			}
			else {
				$hostname = $this->WebApi->get_server_details($_POST['id'], 'HostName'); // read from form;
				$rootpass = $this->WebApi->get_server_details($_POST['id'], 'RootPasswd'); //read from mysql

				$limit = $this->WebApi->get_server_details($_POST['id'], 'MaxUser');
				$expired = 7; // read from user expired
				$count = 5; // read form count mysql

				if ($count === $limit) {
				echo json_encode(
					array(
						'status'=>'Failed','result'=> array(
						'limit' => 'Limit Account on host '. $hostname)
					));
					exit;
				}
				$this->sshcepat->set_hostname($hostname, $rootpass);
				$this->sshcepat->set_user($_POST['username'],$_POST['password'],$expired);
				$this->sshcepat->result(); //show result
			}
        	}
	}
}
