<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListKomunitas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('admin')){
			redirect(base_url('admin/login'));
		}		
	}
	public function index()
	{

		$data['list'] = $this->M_DB->getAll('tbl_komunitas');

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/list_komunitas',$data);
		$this->load->view('templates/admin/footer');
	}
	public function edit($id = null)
		{
			if(is_null($id)){
				redirect(base_url('admin/listKomunitas'));
				exit();
			}

			if(isset($_POST['btn-edit'])){

				$dt_post = $this->input->post();
				$nm_file = '';
				if(($_FILES['foto']['name'] != "")){


					$config['upload_path']          = './assets/img/komunitas/';
					$config['allowed_types']        = 'jpg|png|jpeg';

					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('foto')){
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
					    redirect(base_url('admin/listKomunitas'));
					    die;
					}else{
					    $nm_file = $this->upload->data('file_name');
					} 
				}else{
					$nm_file = $this->M_DB->getWhere('tbl_komunitas',['id'=>$id])->foto;
					// var_dump($id);die();
				}

				$data = [
					'nama' => $dt_post['nama'],
					'kontak' => $dt_post['kontak'],
					'foto' => $nm_file,
				];
				$this->M_DB->edit('tbl_komunitas',$data,['id'=>$id]);
				$this->session->set_flashdata('sukses', '
			    	<div class="row w-100">
				    	<div class="alert alert-success w-100" role="alert">
				    	    Data berhasil di ubah!
				    	</div>
				    	</div>
			    ');
			    redirect(base_url('admin/listKomunitas'));
			    exit();

			}


			$dt_tbl = $this->M_DB->getWhere('tbl_komunitas',['id'=>$id]);

			$op = [
				'method' => 'key',
				'field' => [
					'id' => [
						'use' => false
					],
					'foto' => [
						'type' => 'file',
						'req' => false
					]
				],
				'tags' => [
					'edit' => true
				]
			];
			$data['action'] = base_url('admin/listKomunitas/edit/'.$id);
			$data['form'] = $this->CForm->form_input($dt_tbl,$op);

			$this->load->view('templates/admin/header');
			$this->load->view('templates/admin/aside');
			$this->load->view('templates/admin/menu_top');
			$this->load->view('admin/edit_data',$data);
			$this->load->view('templates/admin/footer');
		}

	public function tambah()
	{
		if(isset($_POST['btn-add'])){
		
			$config['upload_path']          = './assets/img/komunitas/';
			$config['allowed_types']        = 'jpg|png|jpeg';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
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
			    redirect(base_url('admin/listKomunitas/tambah'));
			    die;
			}else{
			    $nm_file = $this->upload->data('file_name');          
			    $data_post = $this->input->post();
			    $data = [
			    	'nama' => $data_post['nama'],
			    	'kontak' => $data_post['kontak'],
			    	'foto' => $nm_file
			    ];

			    $this->M_DB->add('tbl_komunitas',$data);
			    $this->session->set_flashdata('sukses', '
			    	<div class="row w-100">
				    	<div class="alert alert-success w-100" role="alert">
				    	    Data berhasil di tambahkan!
				    	</div>
				    	</div>
			    ');
			    redirect(base_url('admin/listKomunitas'));
			} 
		}
		// echo "string";
		$option = [
			'method' => 'key',
			'field' =>[
				'id' =>[
					'use' => false
				],
				'foto' => [
					'type' => 'file',

				]
			]

		];
		$data = [
			'action' => base_url('admin/listKomunitas/tambah'),
			'lbl' => 'Tambah Data komunitas'
		];
		$data['input'] = $this->CForm->form_input($this->M_DB->getAll('tbl_komunitas')[0],$option);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/add_data',$data);
		$this->load->view('templates/admin/footer');
	}

	public function delete($id = null){
		if(!is_null($id)){
			$this->M_DB->delete('tbl_komunitas',['id'=>$id]);
		    $this->session->set_flashdata('sukses', '
		    	<div class="row w-100">
			    	<div class="alert alert-success w-100" role="alert">
			    	    Data berhasil di hapus!
			    	</div>
			    	</div>
		    ');
		    redirect(base_url('admin/listKomunitas/delete'));

		}
		$data['list'] = $this->M_DB->getAll('tbl_komunitas');
		$this->load->view('templates/admin/header_tbl');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/delete_komunitas',$data);
		$this->load->view('templates/admin/footer_tbl');
	}

}
