<?php
include_once ('Page.php');

class Create extends Page {
	public function ssh($benua, $negara) {
		$data['server']= $this->WebApi->get_ssh($negara);

		for ($i=-1; $i<count($data['server']); $i++) {
			// cek hostname jika kosong isi -1
			$cek = $i;
		}
		if ($cek === -1 ) {
			//jika -1 arahkan ke negara default SG
			$data['server'] = $this->WebApi->get_ssh('Singapore');
		}
		$this->load->view('bootstrap/header', $this->setProp());
		$this->load->view('ssh', $data);
		$this->load->view('bootstrap/footer');
	}
}
