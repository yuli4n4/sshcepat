<?php
class Ajax extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('WebApi');
                $this->load->helper('url_helper');
		$this->load->library('session');
        }
	private function set_resp($status, $response)
	{
		return json_encode(array('status'=>$status,'result'=>$response));
	}
	public function ajax_post()
	{

		if(isset($_POST))
		{
			if (empty($_POST['username'])){
				$this->session->set_flashdata('<p class="text-danger">username', 'is missing</p>');
			}
			if (empty($_POST['password'])){
				$this->session->set_flashdata('<p class="text-danger">passsword', 'is missing</p>');
			}
			if (count($this->session->flashdata()) > 0) {
				echo json_encode($this->session->flashdata());
				exit;
			}
			else {
				$array = array(
					'username' => $_POST['username'],
					'password' => $_POST['password']
				);
				echo $this->set_resp('Success', 'falid');
			}
        	}
	}
	public function test() {
		$this->load->library('sshcepat');  //library

		$this->sshcepat->set_hostname('api.sshcepat.com', 'kampret123'); // hostname, rootpass
		$this->sshcepat->set_user('jawir','kirun','3'); // user, pass, limit
		echo $this->sshcepat->result(); // result
	}
}
