<?php
set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . '/third_party/phpseclib');
include(APPPATH . '/third_party/phpseclib/Net/SSH2.php');
class Sshcepat {
	private $ssh, $hostName, $rootPass, $result;
	public function result() {
		return $this -> result;
	}
	public function set_hostname($host, $root) {
		$this -> ssh = new Net_SSH2($host);
                if (!$this -> ssh-> login('root', $root))
		{
			exit (json_encode(
				array('status' => 'Failed', 'result' => 'Kesalahan root password')
			));
                }
		$this->hostName = $host; $this->rootPass=$root;
	}
	public function set_user($user, $pass, $limit) {
		$ssh  =  $this -> ssh;
		$host = $this -> hostName;
		$root = $this -> rootPass;

		if (empty($host) && empty ($root)) {
			exit (json_encode(
                                array('status' => 'Failed', 'result' => 'Hostname not intiated')
                        ));
		}
		//echo $host; echo $root;
		$ssh->exec("useradd -e \"$limit days\" -s /bin/false -M $user ");
		$ssh->enablePTY();
		$ssh->exec("passwd $user");
		$ssh->read("Enter new UNIX password: ");
		$ssh->write("$pass\n");
		$ssh->read("Retype new UNIX password: ");
		$ssh->write("$pass\n");
    		$this->result = $ssh->read('password updated successfully');
	}
}