<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('admin')){
			redirect(base_url('admin/login'));
		}		
	}
	public function index()
	{
		$data = [
			'action' => base_url('admin/galeri/tambah'),
			'lbl' => 'Tambah Data komunitas'
		];

		$option = [
			'method' => 'num',
			'field' => [
				'id' => [
					'use' => false
				]
			]
		];
		$data['list'] = $this->M_DB->getAll('tbl_galeri');
		// var_dump($data['input']);die();
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/galeri',$data);
		$this->load->view('templates/admin/footer');
	}

	public function tambah()
	{
		if(isset($_POST['btn-add'])){
		
			$config['upload_path']          = './assets/img/galeri/';
			$config['allowed_types']        = 'jpg|png|jpeg';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				// var_dump($this->upload->display_errors());
				// die();
			    $this->session->set_flashdata('message', '

			    <div class="alert alert-danger alert-dismissible fade show" role="alert">
			        <strong>Gagal</strong> '.'Gagal upload file.!'.'
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    
			    ');
			    redirect(base_url('admin/galeri/tambah'));
			    die;
			}else{
			    $nm_file = $this->upload->data('file_name');          
			    $data_post = $this->input->post();
			    $data = [
			    	'gambar' => $nm_file
			    ];

			    $this->M_DB->add('tbl_galeri',$data);
			    $this->session->set_flashdata('sukses', '
			    	<div class="row w-100">
				    	<div class="alert alert-success w-100" role="alert">
				    	    Data berhasil di tambahkan!
				    	</div>
				    	</div>
			    ');
			    redirect(base_url('admin/galeri'));
			} 
		}
		// echo "string";
		$option = [
			'method' => 'num',
			'field' =>[
				'id' =>[
					'use' => false
				],
				'gambar' => [
					'type' => 'file',

				]
			]

		];
		$data = [
			'action' => base_url('admin/galeri/tambah'),
			'lbl' => 'Tambah Galeri'
		];
		$data['input'] = $this->CForm->form_input($this->M_DB->getField('tbl_galeri'),$option);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/add_data',$data);
		$this->load->view('templates/admin/footer');
	}

	public function delete($id = null){
		if(!is_null($id)){
			$this->M_DB->delete('tbl_galeri',['id'=>$id]);
		    $this->session->set_flashdata('sukses', '
		    	<div class="row w-100">
			    	<div class="alert alert-success w-100" role="alert">
			    	    Data berhasil di hapus!
			    	</div>
			    	</div>
		    ');

		}
		redirect(base_url('admin/galeri'));
	}

}
