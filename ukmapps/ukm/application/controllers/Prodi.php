<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function index()
	{
		$data['prodi'] = $this->modelProdi->getData();
    	$data['main'] = 'admin/prodi/index';
		$this->load->view('template/template',$data);

	}

	public function addProdi()
	  {
	      if($this->input->post('submit')==true){
	      // $this->form_validation->set_rules('NIK', 'NIK', 'trim|required|is_unique[tbl_bantuan.NIK]',
	      //   array(  'required'    => '% harus diisi',
	      //           'is_unique'   => 'SUDAH TERDAFTAR DAPAT BANTUAN'));
	    
	      $this->form_validation->set_rules('nama_prodi', 'Nama Prodi','trim|required');
	      if ($this->form_validation->run() == TRUE) {
	    
	        $data = array(
	                'nama_prodi'           => $this->input->post('nama_prodi')
	          );

	        $sql = $this->modelProdi->addData($data);
	        if($sql){
	          $this->session->set_flashdata('info', 'Sukses Tambah Data Lokasi!');
	           redirect('prodi','refresh');
	        } else{
	          $this->session->set_flashdata('info', 'Gagal Tambah Data Lokasi!');
	          redirect('prodi','refresh');
	        }
	      } else {
	        $data['user'] = $this->ion_auth->user()->row();
	        $data['prodi'] = $this->modelProdi->getData();
	        $data['main'] = 'admin/prodi/index';
	        $this->load->view('template/template',$data);
	      }
	    } else{
	      $data['user'] = $this->ion_auth->user()->row();
	      $data['prodi'] = $this->modelProdi->getData();
	      $data['main'] = 'admin/prodi/index';
	      $this->load->view('template/template',$data);
	    }
	  }

}

/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */