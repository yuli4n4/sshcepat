<?php
class Post extends CI_Controller {
	private $server;

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('ssh');
	}
	private function __show($status, $value){
		echo json_encode(array ('status' => $status, 'result' => $value ) );
	}
	private function __requestAccount($id, $user, $pass) {
		$this -> load -> library('sshcepat'); // add lib ssh

		$this -> ssh -> setServer($id); // server set

		// get server info
		$hostName = $this->ssh->getHostname();
		$rootPwd = $this->ssh->getRootPasswd();
		$expired = $this->ssh->getExpired();

		if (empty ($hostName)) {
			$this->__show('Failed', array('Hostname not found'));
			return;
		}
		$set = $this->sshcepat->setHostname($hostName, $rootPwd);
		if ( $set )
		{
			$add = $this -> sshcepat -> addAccount($user, $pass, $expired);
			if ($add === 'Success') {
				$dataShow = array (
					'Status' => 'User Add Successfully!!.',
					'Hostname/Ip' => $hostName,
					'Username' => $user,
					'Password' => $pass,
					'Reg_date' => date("Y-m-d H:i:s",time()),
					'Exp_date' => date("Y-m-d H:i:s",strtotime("+$expired days",time()))
				);
				$this->__show('Success', $dataShow);
			}
			return;
		}
		$this->__show('Failed', array('Root passwd Failed = '. $rootPwd));

	}
	public function index()
	{
		$id; $user; $passwd;
		if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']))
		{
			$id = $_POST['id'];
			$user = $_POST['username'];
			$passwd = $_POST['password'];
		}
		else { show_404(); }
		if (strlen($user) < 5 || strlen($user) > 10)
		{
			$this-> __show('Failed',
				array('Username minimum 5 karakter, maksimum 10!!.'));
			return;
		}
		 if (strlen($passwd) < 5 || strlen($passwd) > 15)
                {
                        $this-> __show('Failed',
                                array('Passwd minimum 5 karakter, dan maksimal 15!!.'));
                        return;
                }
		$this -> __requestAccount($id, $user, $passwd);

	}
}
