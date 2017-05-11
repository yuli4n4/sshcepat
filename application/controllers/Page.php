<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');
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
class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('WebApi');
		$this->load->helper('url_helper');
	}
	private function _set_view($file, $init)
	{
		$header = $this->WebApi->get_site_details();

		$this->load->view('bootstrap/header', $header);
		$this->load->view($file, $init);
                $this->load->view('bootstrap/footer');
	}
	public function index()
        {
                $index['benua'] = $this->WebApi->get_continent();
                $this-> _set_view('index', $index);
        }
	public function get_location($benua = FALSE)
	{
		if ($benua === FALSE){show_404();}
		if ( empty($this->WebApi->get_location($benua)) ){
			show_404();
		}
		$data['country'] = $this->WebApi->get_location($benua);
		$this->_set_view('country', $data);

	}
	public function get_hostname($negara = FALSE)
	{
		if ($negara === FALSE){show_404();}

		if ( ! empty($data = $this->WebApi->get_hostname($negara)) )
		{
			$data['server'] = $data;
		}
		else {$data['server'] = $this->WebApi->get_hostname('Singapore');}
		$this->_set_view('hostname', $data);
        }
        public function set_hostname($id)
	{
		if (!is_numeric($id) || strlen($id) > 5 ) {show_404();}
		$data['id'] = $id;
		$this->_set_view('create', $data);
        }
}
