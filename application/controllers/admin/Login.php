<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('admin')){
			redirect(base_url('admin'));
		}
	}

	public function index()
	{
		if(isset($_POST['btn-login'])){
			$post = $this->input->post();
			$data = [
				'username' => $post['username'],
				'password' => $post['password'],
			];
			$auth = $this->M_DB->getWhere('tbl_login',$data);
			if($auth){
				$this->session->set_userdata('admin',true);
				redirect(base_url('admin'));
				exit();
			}else{
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					  Username atau password salah!
					</div>');
				redirect(base_url('admin/login'));
				exit();
			}
		}
		
		$this->load->view('admin/login');
	}

}
