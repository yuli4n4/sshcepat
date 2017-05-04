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
class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('WebApi');
		$this->load->helper('url_helper');
	}
	private function set_view($file, $init)
	{
                $data['title'] = 'Free SSH Account';
                $data['brand'] = 'YOURSITE';

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
		$country['benua'] = $this->WebApi->get_location($benua);
		$this->set_view('country', $country);
	}
	public function get_hostname($negara) {
                $hostname['server']= $this->WebApi->get_hostname($negara);

		for ($i=-1; $i<count($hostname['server']); $i++) { $host = $i; }
                if ($host === -1 ) {
			$hostname['server'] = $this->WebApi->get_hostname('Singapore');
		}
                $this->set_view('hostname', $hostname);
        }
        public function set_hostname($id) {
		$data['ssh']= $this->WebApi->get_hostname('', $id);

                $this->load->view('create', $data);
        }
}
