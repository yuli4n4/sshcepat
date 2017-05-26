<?php
class Seller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('user_model');
		$this->load->helper('url_helper');
		$this->load->library(array('session'));
	}
	private function _set_view($file, $init) {
		
		$this->load->view('panel/base/page_header');
		$this->load->view($file, $init);
        $this->load->view('panel/base/footer');
	}
	public function seller($user=FALSE) {
		
		//if (empty($user)) {show_404();}
		
		if ($_SESSION['username'] === $user && $_SESSION['is_admin'] === false) {
			
			$data = new stdClass();
			$data->user = $this->user_model->get_user($_SESSION['user_id']);
			$data->server=$this->user_model->get_hostname();
			$this->_set_view('panel/seller/servers', $data);
		}
		else {redirect(base_url('login/login'));}
	}
	public function addsaldo_hp() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$this->form_validation->set_rules('sender', 'Pengirim', 'trim|required|min_length[4]');
		    $this->form_validation->set_rules('hp', 'No Telp', 'trim|required|min_length[4]');
			$user = $this->user_model->get_user($_SESSION['user_id']);
			if ($this->form_validation->run() === false) {
				$data = new stdClass();
				$data->user = $this->user_model->get_user($_SESSION['user_id']);
				$this->_set_view('panel/seller/addsaldo_hp', $data);
			} else {
				$mkios = $this->input->post('mkios');
				$sender = $this->input->post('sender');
				$hp = $this->input->post('hp');
				$jumlah= $this->input->post('jumlah');
				if (empty($mkios)) {
					$pesan = $user->username. ' Meminta saldo via no hp: ' .$sender. ' dikirim ke nomor : '. $hp .' sebesar : '. $jumlah;
					} else {
						$pesan = $user->username. ' Meminta saldo via mkios Dengan no seri ' .$mkios. ' dikirim ke nomor '.$hp.' sebesar : '. $jumlah;
					}
				$userid=$_SESSION['user_id'];
				if ($this->user_model->deposit($userid, $pesan, $jumlah)) {
					
					
					 $data = new stdClass();
					 $data -> message = 'Terimakasih telah membeli ssh di server kami . silkan tunggu beberapa saat saldo anda akan bertambah otomatis, konfirmasi ini membutuhkan waktu paling lama 1x24 jam.';
					 $data->user = $this->user_model->get_user($_SESSION['user_id']);
					 $this->_set_view('panel/seller/addsaldo_hp', $data);
				}
				else {echo "database error";}
			}
		}
		else {redirect(base_url('login/login'));}
		
	}
	public function addsaldo_req() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$this->form_validation->set_rules('sender', 'Rekening', 'trim|required|min_length[4]');
		    $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]');
		    $this->form_validation->set_rules('rekening', 'tujuan', 'trim|required|min_length[4]');
			$user = $this->user_model->get_user($_SESSION['user_id']);
			if ($this->form_validation->run() === false) {
				$data = new stdClass();
				$data->user = $this->user_model->get_user($_SESSION['user_id']);
				$this->_set_view('panel/seller/addsaldo_req', $data);
			} else {
				$sender = $this->input->post('sender');
				$username = $this->input->post('username');
				$rekening= $this->input->post('rekening');
				$jumlah= $this->input->post('jumlah');
				$userid=$_SESSION['user_id'];
				
				$pesan = $user->username. ' Meminta saldo sebesar '. $jumlah. ' via reqkening '. $sender. ' Dengan atas nama '.$username.' ke no req '. $rekening;
				if ($this->user_model->deposit($userid, $pesan, $jumlah)) { 
					 $data = new stdClass();
					 $data -> message = 'Terimakasih telah membeli ssh di server kami . silkan tunggu beberapa saat saldo anda akan bertambah otomatis, konfirmasi ini membutuhkan waktu paling lama 1x24 jam.';
					 $data->user = $this->user_model->get_user($_SESSION['user_id']);
					 $this->_set_view('panel/seller/addsaldo_req', $data); 
				}
				else {echo "database error";}
			}
		}
		else {redirect(base_url('login/login'));}
		
	}
	public function buy($id=FALSE) {
		
		
		
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$data = new StdClass();
			$server = $this->user_model->get_hostname($id);
			$user = $this->user_model->get_user($_SESSION['user_id']);
			if (empty($server)) {show_404();}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('sshcepat');
			 if ($server->Status) {
				 if ($user->saldo < $server->Price) {
					 
					 $data = new stdClass();
					 $data->message='<p class="text-danger">Saldo anda kurang</p>';
					 $data->user = $this->user_model->get_user($_SESSION['user_id']);
					 $data->server=$this->user_model->get_hostname();
					 $this->_set_view('panel/seller/servers', $data);
					 return;
				  }
				  $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
				  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				  if ($this->form_validation->run() === false) {
					  $data->server = $server; $data->user=$user;
					  $this->load->view('panel/base/page_header');
					  $this->load->view('panel/seller/create', $data);
					  $this->load->view('panel/base/footer');
					  } else {
						$username = $this->input->post('username');
						$password = $this->input->post('password');
						$expired = $this->input->post('expired');
						$set = $this->sshcepat->setHostname($server->HostName, $server->RootPasswd);
						if ($set) { if (empty($this->user_model->get_user_id_from_ssh($username, $server->Id)) ) {
							if ($this->sshcepat->addAccount($username, $password, $expired) == 'Success') {
								if ($this->user_model->user_ssh($username, $server->HostName, $user->username, $expired, $server->Id, $server->Price)) {
										$saldo = $user->saldo - $server->Price;
										if ($this->user_model->update_saldo($user->username, $saldo)){
											$data ->user = array (
												'message' => '<div class="alert alert-success">Akun sukses dibuat</div>',
												'username' => $username,
												'password' => $password,
												'hostname' => $server -> HostName,
												'openssh' => $server -> OpenSSH,
												'dropbear' => $server -> Dropbear,
												'location' => $server -> Location,
												'price' => $server -> Price,
												'expired' => date("Y-m-d H:i:s",strtotime("+$expired days",time()) )
											);
											$this->load->view('panel/base/page_header');
											$this->load->view('panel/seller/account', $data);
											$this->load->view('panel/base/footer');
										} else {echo "database error";}
								} else { echo "database error"; }
							}
						} else {
							$data->server = $server; $data->user=$user;
							$data->message='<p class="text-danger">Username ini sudah ada</p>';
							$this->load->view('panel/base/page_header');
							$this->load->view('panel/seller/create', $data);
							$this->load->view('panel/base/footer');
						}
						} else { echo "rootpasswd eroor";}
			}
		} else {
					 $data ->server = $this->user_model->get_hostname();
					 $data ->user = $this->user_model->get_user($_SESSION['user_id']);
					 $this->_set_view('panel/seller/servers', $data);
					 return;
			 }
		}
		
		else {redirect(base_url('login/login'));}
		
	}
	public function cek_account($user=false) {
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$data = new StdClass();
			$data->account= $this->user_model->get_account_list($user);
			$this->_set_view('panel/seller/account_list', $data);
		}
		else {redirect(base_url('login/login'));}
	}
	public function delet_account($id) {
		$this->load->library('sshcepat');
		if (empty($this->user_model->id_ssh($id)->hostname)) { Show_404(); }
		$hostname = $this->user_model->id_ssh($id)->hostname;
		$rootpass = $this->user_model->get_hostname($this->user_model->id_ssh($id)->serverid)->RootPasswd;
		$username = $this->user_model->id_ssh($id)->username;
		
		$set = $this->sshcepat->setHostname($hostname, $rootpass);
		
		if ( isset($_SESSION['username']) && $_SESSION['logged_in'] === true ) {
			if ($this->user_model->delete_user_ssh($id)) {
				if ($set) {
					if ($this->sshcepat->deletAccount($username)) {
						redirect(base_url('panel/reseller/cek_account/'.$_SESSION['username']));
						
					}
				}
				else {echo 'Root passwd wrong!';}
			}
		}
		else { redirect(base_url('login/login')); }
		
	}
	
}
