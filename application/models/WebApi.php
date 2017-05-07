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

class WebApi extends CI_Model {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('sshcepat');
	}
	public function get_site_details() {
		$query = $this->db->get('website');
		return $query->result_array();
	}
	public function get_continent($cid = FALSE)
	{
		if ($cid === FALSE )
		{
			$query = $this->db->get('continent');
			return $query->result_array();
		}
		$query = $this->db->get_where('continent', array('Cid' => $cid));
		return  $query->result_array();
	}
	public function get_location($cid) {
                 $query = $this->db->get_where('country', array('Cid' => $cid));
                 return $query->result_array();
	}
	public function get_hostname($location, $id=FALSE) {
		if ($id === FALSE )
		{
			$query = $this->db->get_where('server', array('Location' => $location));
        		return $query->result_array();
		}
		$query = $this->db->get('server', array('Id' => $id));
		return $query->result_array();
	}
	public function get_server_details($id, $data) {

		$id = (string)(int)$id;
		$array=array();

		$query = $this->db->query("SELECT * FROM server WHERE Id =$id;");
		foreach ($query->result_array() as $row) {
			$tmp = array(
					'Id' => $row['Id'],
					'HostName' => $row['HostName'],
					'RootPasswd' => $row['RootPasswd'],
					'MaxUser' => $row['MaxUser'],
					'OpenSSH' => $row['OpenSSH'],
					'DropBear' => $row['Dropbear']
			);
			array_push($array,$tmp);
		}
		if (empty($array[0][$data])) {show_404();}
		return $array[0][$data];
	}
}
