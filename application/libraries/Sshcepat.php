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
 * OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFT
*/
class Sshcepat {

	private $ssh;

	public function __construct()
        {
                set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . '/third_party/phpseclib');
                include(APPPATH . '/third_party/phpseclib/Net/SSH2.php');
        }

	public function setHostname($host, $root)
	{
		if (!empty($host) && !empty($root))
		{
			$ssh= new Net_SSH2($host);
			if (!$ssh->login('root', $root)) { return false; }
			$this -> ssh = $ssh;
			return true;

		}
	}
	public function addAccount($user, $pass, $expired)
        {
		if (empty($user) && empty($pass) && empty($expired)){ exit; }

                if ($user === 'root') { exit; }

		$this->ssh->exec("useradd -e \"$expired days\" -s /bin/false -M $user ");
                $this->ssh->enablePTY();
                $this->ssh->exec("passwd $user");
                $this->ssh->read("Enter new UNIX password: ");
                $this->ssh->write("$pass\n");
                $this->ssh->read("Retype new UNIX password: ");
                $this->ssh->write("$pass\n");
                $this->ssh->read('password updated successfully');
		return 'Success';
        }

}
