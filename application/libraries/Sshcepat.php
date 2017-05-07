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

class Sshcepat {
	private $ssh;

	public $hostName;
	public $rootPass;
	public $result;

	public function __construct()
	{
		set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . '/third_party/phpseclib');
		include(APPPATH . '/third_party/phpseclib/Net/SSH2.php');
	}
	public function result()
	{
		echo json_encode($this -> result);
		exit;
	}
	public function set_hostname($host, $root)
	{
		$this -> ssh = new Net_SSH2($host);
		if (!$this -> ssh-> login('root', $root))
		{
			exit (json_encode(
				array('status' => 'Failed', 'result' => 'Kesalahan root password')
			));
		}
		$this->hostName = $host; $this->rootPass=$root;
	}
	public function set_user($user, $pass, $limit)
	{
		// security server if  value user is null
		if (strlen($user) < 3 ) {
			exit (json_encode(
                                array('status' => 'Failed', 'result' => 'Username empty')
                        ));
		}
		if (strlen($pass) < 3 ) {
                        exit (json_encode(
                                array('status' => 'Failed', 'result' => 'passwd empty')
                        ));
                }
		if (!is_int($limit)) {
                        exit (json_encode(
                                array('status' => 'Failed', 'result' => 'only integar value for limit')
                        ));
                }

		$limits = (string)$limit;
		$reg = date("Y-m-d H:i:s",time());
   		$exp = date("Y-m-d H:i:s",strtotime("+$limits days",time()));
		// initial host
		$ssh  =  $this -> ssh;
		$host = $this -> hostName;
		$root = $this -> rootPass;

		if (empty($host) && empty ($root))
		{
			exit (json_encode(
                                array('status' => 'Failed', 'result' => 'Hostname not intiated')
                        ));
		}
		//esec command
		$ssh->exec("useradd -e \"$limits days\" -s /bin/false -M $user ");
		$ssh->enablePTY();
		$ssh->exec("passwd $user");
		$ssh->read("Enter new UNIX password: ");
		$ssh->write("$pass\n");
		$ssh->read("Retype new UNIX password: ");
		$ssh->write("$pass\n");
		$ssh->read('password updated successfully');
    		$this->result = array('status' => 'Success','result' => array(
				'Success' => 'Your Account added successfully',
				'Hostname/Ip' => $host,
				'Username' => $user,
				'Password' => $pass,
				'Reg Date' =>  $reg,
				'Exp Date' => $exp
				));
	}
	public function del_user($user) {
		if (empty($this->hostName) && empty ($this->rootPass))
                {
                        exit (json_encode(
                                array('status' => 'Failed', 'result' => 'Hostname not intiated')
                        ));
                }
		$this->ssh->exec("userdel -f $user ");
		$this -> result = array('status' => 'Success','result' => 'Username ' .$user. ' Deleted!!!');

	}
}
