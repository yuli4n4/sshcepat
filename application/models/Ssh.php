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

class Ssh extends CI_Model {

	private $hostName, $rootPasswd, $maxUser, $expired, $price, $status;

	private $counter, $date;

	public function __construct()
        {
                parent::__construct();
		$this->load->database();
        }
	public function setServer($id){

		$query = $this->db->get_where('server', array('Id' => $id));

                foreach ($query->result_array() as $row)
		{
			$this->hostName = $row['HostName'];
			$this->rootPasswd = $row['RootPasswd'];
			$this->maxUser = $row['MaxUser'];
			$this->expired = $row['Expired'];
			$this->price = $row['Price'];
			$this->status = $row['Status'];
		}
		$this-> __getUserExpired($this->hostName);

	}
	private function __getUserExpired($val) {

		$query = $this->db->get_where('userlimit', array('Hostname' => $val));

		foreach ($query->result_array() as $row)
		{
			$this->counter = $row['Counter'];
			$this->date = $row['Date'];
		}
	}
	public function updateCounter() {

		$count = $this->getCounter() + 1;
		$this->db->where('Hostname', $this->getHostName());
		$this->db->update('userlimit', array('Counter'=>$count));
	}
	public function updateDate() {

		$this->db->where('Hostname', $this->getHostName());
		$this->db->update('userlimit',array('Counter'=>NULL,'Date'=>date("Y-m-d")));
		exit;
        }
	public function getHostName() { return $this->hostName; }

	public function getRootPasswd() { return $this->rootPasswd; }

	public function getMaxUser() { return $this->maxUser; }

	public function getExpired() { return $this->expired; }

	public function getCounter() { return $this->counter; }

	public function getDate() { return $this->date; }
	public function getPrice() { return $this->price; }
	public function active() { return $this->status; }
}
