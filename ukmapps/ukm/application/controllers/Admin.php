<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("MemberModel");
		$this->load->model('modelProdi');
		$this->load->model('modelUkm');
		if(!$this->ion_auth->is_admin()){
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['user']	= $this->ion_auth->user()->row();
		$data['main']	= 'admin/dashboard';
		$this->load->view('template/template',$data);
	}
	public function member()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['main']			= 'admin/member';
		// $data['list_member']	= $this->ion_auth->users()->result();
		$data['list_member']=$this->MemberModel->modelmember();
		$this->load->view('template/template',$data);
	}

	public function memberadd()
	{
		$data['user']			= $this->ion_auth->user()->row();
		 $data['prodi'] = $this->modelProdi->getData();
		$data['list_groups']=$this->MemberModel->modelgroups();

		if(isset($_POST['Submit']))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			// $this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|min_length[2]');
			// $this->form_validation->set_rules('last_name', 'Lastname', 'trim|required|min_length[2]');

			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');

			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = array(
										// 'first_name' => $this->input->post('first_name'),
										// 'last_name' => $this->input->post('last_name'),
										'id_prodi'=> $this->input->post('id_prodi'),
										'phone'=> $this->input->post('phone'),
										'nama_lengkap'=> $this->input->post('nama_lengkap'),
										'semester'=> $this->input->post('semester'),
										'alamat'=> $this->input->post('alamat'),
										'templat_lahir'=> $this->input->post('tempat_lahir'),
										'tanggal_lahir'=> $this->input->post('tanggal_lahir'),
										'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
										'agama'=> $this->input->post('agama'),
										);

				// UNTUK SESSION 
				// $this->MemberModel->us_group_add($this->uri->segment(3),$additional_data);
				$sql = $this->ion_auth->register($username, $password, $email, $additional_data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Tambah Data!');
					redirect(base_url("admin/member"));
				} else{
					$this->session->set_flashdata('info', 'Gagal Tambah Data!');
					redirect(base_url("admin/member"));
				}
			} else {
				$data['main']			= 'admin/memberadd';
				$this->load->view('template/template', $data);
			}
		} else{
			$data['main']			= 'admin/memberadd';
			$this->load->view('template/template', $data);
		}
	}

	public function memberdelete($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('admin/member');
		}

		$sql = $this->ion_auth->delete_user($id);
		if($sql){
			$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
			redirect('admin/member');
		} else{
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('admin/member');
		}
	}

	public function changeData($id=null)
	{
		$data['user']			= $this->ion_auth->user()->row();
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('admin/member');
		} 

		$data['list_member']=$this->MemberModel->memberedit($id);
		// $id_group	= $this->ion_auth->get_users_groups($id)->row();

		if(isset($_POST['Submit']))
		{

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			// $this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');

			if ($this->form_validation->run() == TRUE) {
				$additional_data = array(
									'username' => $this->input->post('username'),
									'email' => $this->input->post('email'),
									'id_prodi'=> $this->input->post('id_prodi'),
									'phone'=> $this->input->post('phone'),
									'nama_lengkap'=> $this->input->post('nama_lengkap'),
									'semester'=> $this->input->post('semester'),
									'alamat'=> $this->input->post('alamat'),
									'templat_lahir'=> $this->input->post('tempat_lahir'),
									'tanggal_lahir'=> $this->input->post('tanggal_lahir'),
									'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
									'agama'=> $this->input->post('agama'),
									'phone' => $this->input->post('phone'),
									);
				$sql = $this->ion_auth->update($this->uri->segment(3), $additional_data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Edit Data!');
					redirect(base_url("admin/member"));
				}else{
					$this->session->set_flashdata('info', 'Gagal Edit Data!');
					redirect('admin/member');
				}
			} else {
				$data['main']			= 'admin/memberupdate';
				$this->load->view('template/template', $data);
			}
		
		} else{
			$data['main']			= 'admin/memberupdate';
			$this->load->view('template/template', $data);
		}
		
	}

	public function memberChangePassword($id=null){
		$data['user']	= $this->ion_auth->user()->row();
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('admin/member');
		}

		if(isset($_POST['Submit']))
		{
			$this->form_validation->set_rules('password', 'New Password', 'required');
			$this->form_validation->set_rules('r_password', 'Retype Password', 'required|matches[password]');

			if ($this->form_validation->run() == TRUE) {
				$additional_data = array(
									'password' => $this->input->post('password'),
									);
				$sql = $this->ion_auth->update($id, $additional_data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Ubah Password!');
					redirect('admin/member');
				}else{
					$this->session->set_flashdata('info', 'Gagal Ubah Password!');
					redirect('admin/member');
				}
			} else {
				$data['list_member']=$this->MemberModel->memberedit($id);
				$data['main']			= 'admin/memberupdate';
				$this->load->view('admin/template', $data);
			}
		
		}
	}
	public function groups()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['main']			= 'admin/groups';
		$data['list_groups']=$this->MemberModel->modelgroups();
		// $data['list_groups']	= $this->ion_auth->groups()->result();
		$this->load->view('admin/template',$data);
	}
	public function groupsadd()
	{
		$data['user']			= $this->ion_auth->user()->row();

		if($this->input->post('Submit')==true)
		{
			$group = $this->ion_auth->create_group($this->input->post('name'), $this->input->post('description'));

	        if(!$group)
	        {
	        	$view_errors = $this->ion_auth->messages();
	        	$this->session->set_flashdata('info', 'Gagal Buat Grup Baru');
	      		redirect("admin/groups");
	      	}
	      	else
	      	{
	      		$this->session->set_flashdata('info', 'Berhasil Buat Grup Baru');

	      		//$new_group_id = $group;
	      		redirect("admin/groups");
	      	}
		} else {
			$data['main']			= 'admin/groupsadd';
			$this->load->view('admin/template', $data);
		}
	}

	public function profile()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['main'] = 'admin/updateprofile';
		$this->load->view('template/template',$data);
	}
	public function changeProfile($id=null)
	{
		if($id==null){
			redirect('admin/profile');
		} 

		if(isset($_POST['Submit']))
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');

			if ($this->form_validation->run() == TRUE) {
				$additional_data = array(
									'email' => $this->input->post('email'),
									'first_name' => $this->input->post('first_name'),
									'last_name' => $this->input->post('last_name'),
									'phone' => $this->input->post('phone'),
									);
				$sql = $this->ion_auth->update($this->uri->segment(3), $additional_data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil Update Profile!');
					redirect('admin/profile');
				}else{
					$this->session->set_flashdata('info', 'Gagal Update Profile!');
					redirect('admin/profile');
				}
			} else {
				$this->user_profil();
			}
		
		}
	}

	public function prodi()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['prodi'] = $this->modelProdi->getData();
    	$data['main'] = 'admin/prodi/index';
		$this->load->view('template/template',$data);

	}

	public function addProdi()
	  {
	      if($this->input->post('submit')==true){
	      $this->form_validation->set_rules('nama_prodi', 'Nama Prodi','trim|required');
	      if ($this->form_validation->run() == TRUE) {
	    
	        $data = array(
	                'nama_prodi'           => $this->input->post('nama_prodi')
	          );

	        $sql = $this->modelProdi->addData($data);
	        if($sql){
	          $this->session->set_flashdata('info', 'Sukses Tambah Data Lokasi!');
	           redirect('admin/prodi','refresh');
	        } else{
	          $this->session->set_flashdata('info', 'Gagal Tambah Data Lokasi!');
	          redirect('admin/prodi','refresh');
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
public function editProdi($id=null)
  {
    if($id==null){
       $this->session->set_flashdata('info', 'Gagal Edit Data!');
       redirect('admin/prodi','refresh');
  } 
    if($this->input->post('submit')==true){
        $this->form_validation->set_rules('nama_prodi', 'Nama Agenda','trim|required');
        
        if ($this->form_validation->run() == TRUE) {
             $data = array(
                'nama_prodi' 		        => $this->input->post('nama_prodi'),
                
            );
            $sql = $this->modelProdi->updateData($id,$data);
            if($sql){
                $this->session->set_flashdata('info', 'Berhasil Simpan Data!');
                redirect('admin/prodi','refresh');
            } else{
                $this->session->set_flashdata('info', 'Gagal Simpan Data!');
                redirect('admin/editProdi/'.$id,'refresh');
            }
        } 
    }
    $data['user'] = $this->ion_auth->user()->row();
    $data['prodi']	= $this->modelProdi->getDataById($id);
    $data['main'] 	= 'admin/prodi/edit';
    $this->load->view('template/template',$data);
    }

    public function deleteProdi($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('bantuan','refresh');
		}

		$sql = $this->modelProdi->deleteData($id);
		if($sql){
			$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
			redirect('admin/prodi','refresh');
		} else{
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('admin/prodi','refresh');
		}
  }

  public function ukm()
  {
  	$data['user'] = $this->ion_auth->user()->row();
  	$data['ukm']	= $this->modelUkm->getData();
  	$data['main']	= 'admin/ukm/index';
  	$this->load->view('template/template', $data);
  }

   public function addUkm()
  {
    $config = [
			'upload_path' => './uploads/ukm',
			'allowed_types' => 'gif|jpg|png|jpeg',
		      'max_size' => 6250, 
		      // 'encrypt_name'	=> TRUE,
		
		  ];
	
			  $this->load->library('upload', $config);
			  if (!$this->upload->do_upload('gambar')) 
			  {
			   $data['error'] = $this->upload->display_errors(); 
              // $data['ukm'] = $this->modelUkm->getKondisi();
			   $data['user']			= $this->ion_auth->user()->row();
         	 $data['main'] = 'admin/ukm/add';
          	$this->load->view('template/template', $data);
			  } else {
              $file = $this->upload->data();
              $config['image_library']='gd2';
              $config['source_image']='./uploads/ukm/'.$file['file_name'];
              $config['create_thumb']= FALSE;
              $config['maintain_ratio']= FALSE;
              $config['quality']= '50%';
              $config['width']= 600;
              $config['height']= 400;
              $config['new_image']= './uploads/ukm/'.$file['file_name'];
              $this->load->library('image_lib', $config);
              $this->image_lib->resize();
					  	$data = array(
                			'nama_ukm' 			      => $this->input->post('nama_ukm'),
   			                'sejarah' 			      => $this->input->post('sejarah'),
   			                'visi' 			      => $this->input->post('visi'),
   			                'misi' 			      => $this->input->post('misi'),
						    'gambar'    =>$file['file_name'],    
					  );
					  $this->modelUkm->addData($data); //memasukan data ke database
					  $this->session->set_flashdata('info', 'Berhasil Simpan Data!');
					  redirect('admin/ukm');
			  }
  }

   public function editUkm($id=null)
  {
    if($id==null){
      $this->session->set_flashdata('info', 'Gagal Edit Data!');
      redirect('admin/ukm','refresh');
  } 
      $config = [
      'upload_path' => './uploads/ukm',
      'allowed_types' => 'gif|jpg|png|jpeg',
      'max_size' => 6250, 
      'encrypt_name'	=> TRUE,
      /*'max_width' => 1000,
      'max_height' => 768*/
      ];
      $config2 = [
      'upload_path' => './uploads/rumah',
      'allowed_types' => 'gif|jpg|png|jpeg',
      'max_size' => 6250, 
      'encrypt_name'	=> TRUE,
      /*'max_width' => 1000,
      'max_height' => 768*/
      ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) //jika gagal upload
        {
        $data['error'] = $this->upload->display_errors(); //tampilkan error
         $data['user']			= $this->ion_auth->user()->row();
        $data['ukm']	= $this->modelUkm->getDataById($id);
        $data['main'] = 'admin/ukm/edit';
        $this->load->view('template/template', $data);
        } else {
            $file = $this->upload->data();
              $data = array(
               				'nama_ukm' 			      => $this->input->post('nama_ukm'),
   			                'sejarah' 			      => $this->input->post('sejarah'),
   			                'visi' 			      => $this->input->post('visi'),
   			                'misi' 			      => $this->input->post('misi'),
						    'gambar'    =>$file['file_name'],      
            );
            $this->modelUkm->updateData($id,$data); //memasukan data ke database
            $this->session->set_flashdata('info', 'Berhasil Simpan Data!');
            redirect('admin/ukm');
        }
  }


   public function deleteUkm($id=null)
	{
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('admin/ukm','refresh');
		}

		$sql = $this->modelUkm->deleteData($id);
		if($sql){
			$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
			redirect('admin/ukm','refresh');
		} else{
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('admin/ukm','refresh');
		}
  }
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */