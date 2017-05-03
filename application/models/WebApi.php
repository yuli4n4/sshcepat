<?php
class WebApi extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function get_host($id = FALSE)
	{
        	if ($id === FALSE)
        	{
                	$query = $this->db->get('server');
                	return $query->result_array();
        	}

        	$query = $this->db->get_where('server', array('Id' => $id));
        	return $query->result_array();
	}
	public function get_continent($id = FALSE) {
		if ($id === FALSE ){

			$query = $this->db->get('continent');
			return $query->result_array();
		}
		 $query = $this->db->get_where('continent', array('Cid' => $id));
               	 return $query->result_array();

	}
	public function get_country($id) {
                 $query = $this->db->get_where('country', array('Cid' => $id));
                 return $query->result_array();

        }
	public function get_ssh($id) {
		$query = $this->db->get_where('server', array('Location' => $id));
                return $query->result_array();

        }

}
