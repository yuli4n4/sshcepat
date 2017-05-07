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

		$this->load->model('WebApi');
		$this->load->helper('url_helper');
	}
	private function set_view($file, $init)
	{
		foreach ($this->WebApi->get_site_details() as $row) {
			$data['author'] = $row['author'];
                        $data['title'] = $row['title'];
			$data['description'] = $row['description'];
			$data['brand'] = $row['brand'];
			break;
                }

		$this->load->view('bootstrap/header', $data);
                $this->load->view($file, $init);
                $this->load->view('bootstrap/footer');
	}
	public function index()
        {
                $index['benua'] = $this->WebApi->get_continent();
                $this->set_view('index', $index);
        }
	public function get_location($benua)
	{
		$isValidLocation = false;

		$data['benua'] = $this->WebApi->get_location($benua);
		foreach ($data['benua'] as $row) { $isValidLocation = true; break; }

		if ( ! $isValidLocation )
		{
			show_404();
		}
		$this->set_view('country', $data);
	}
	public function get_hostname($negara)
	{
		$isHostAlready = false;

                $data['server'] = $this->WebApi->get_hostname($negara);
		foreach ($data['server'] as $row) { $isHostAlready = true; break; }

		if (! $isHostAlready )
		{
			$data['server'] = $this->WebApi->get_hostname('Singapore');
		}
                $this->set_view('hostname', $data);
        }
        public function set_hostname($id)
	{
		$create['id']= $this->WebApi->get_server_details($id, 'Id');
		$this->set_view('create', $create);
        }
	public function test() {
	}
}
