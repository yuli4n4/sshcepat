<?php
/*
 * Copyright (c) 2006-2017 Adipati Arya <jawircodes@gmail.com>,
 * 2006-2017 http://sshcepat.com
 *
 * Permission to use, copy, modify, and distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
 * ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
 * ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
 * OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */
class Post extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('sshcepat');
		$this->load->model('ssh');
	}
	private function __show($status, $value){
		echo json_encode(array ('status' => $status, 'result' => $value ) );
	}
	private function __requestAccount($id, $user, $pass) {
		$this -> ssh -> setServer($id); // server set

		if (empty($this->ssh->getHostname())) {
			$this->__show('Failed', array('Hostname not found')); return;
		}
		if ( $this->ssh->getCounter()  >= $this->ssh->getMaxUser() )
		{
			if ($this->ssh->getDate() === date("Y-m-d")){
				$this->__show('Failed', array('Limit account on Day'));
			 	return;
			}

			$this->ssh-> updateDate();

			$this->__show('Failed', array('Please Try Againt!!'));
			return;
		}
		if ( $this -> __getHostName() )
		{
			$expired = $this->ssh->getExpired();

			if (($this -> __setUser($user, $pass, $expired)) === 'Success') {
				$this -> ssh -> updateCounter();
				$this->__show(
					'Success',
					   array(
						'Status' => 'User Add Successfully!!.',
						'Hostname/Ip' => $this->ssh->getHostname(),
						'Username' => $user,
						'Password' => $pass,
						'Reg_date' => date("Y-m-d H:i:s",time()),
						'Exp_date' => date("Y-m-d H:i:s",strtotime("+$expired days",time())
						)
					)
				);
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
	private function __getHostname()
	{
		 return $this->sshcepat-> setHostname($this->ssh->getHostname(), $this->ssh->getRootPasswd());
	}
	private function __setUser($u, $p, $e) {
		return  $this -> sshcepat ->addAccount($u, $p, $e);
	}
}
