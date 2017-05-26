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

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function get_site_details() {
		$query = $this->db->get('website');
		if (empty($query -> result_array())) {
			exit;
		}
		foreach ($query->result_array() as $row) {
			return array (
				'author' => $row['author'],
				'title' => $row['title'],
				'description' => $row['description'],
				'keyword' => $row['keyword'],
				'brand' => $row['brand']
			);
		}
	}
	public function get_continent() {
		$query = $this->db->get_where('continent');
		$arr = array();
		foreach ($query->result_array() as $row) {
			array_push($arr, $row['Name']);
		}
		return $arr;
	}
	public function get_location($name = FALSE) {
		if ($name === FALSE) { show_404(); }
		$query = $this->db->get_where('country', array('Name' => $name));
		$arr = array();
		foreach ($query->result_array() as $row) {
			$tmp = array(
				'Name' => $row['Name'],
				'Country' => $row['Country']
			);
			array_push($arr, $tmp);
		}
		return $arr;
	
		
	}
	public function get_country() {
		$query = $this->db->get('country');
		return $query->result_array();
	}
	public function get_hostname($location) {
		$query = $this->db->get_where('server', array('Location' => $location));
		$arr = array();
		foreach ($query->result_array() as $row) {
			$tmp = array(
				'Id' => $row['Id'],
				'ServerName' => $row['ServerName'],
				'HostName' => $row['HostName'],
				'Location' => $row['Location'],
				'OpenSSH' => $row['OpenSSH'],
				'Dropbear' => $row['Dropbear'],
				'MaxUser' => $row['MaxUser']
			);
			array_push($arr, $tmp);
		}
		return $arr;
	}
}
