<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function index()
	{
		$data['main']	= 'admin/pendaftaran';
		$this->load->view('template/template', $data, FALSE);
	}

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */