<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_lansia extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// if(!$this->session->userdata('user')){
		// 	redirect(base_url('login'));
		// }		
	}

	public function index()
	{

		$data['list'] = $this->M_DB->getAll('tbl_lansia');

		// $data['list'] = $this->M_DB->getAll('tbl_komunitas');
		$this->load->view('templates/admin/header_tbl');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/data_lansia',$data);
		$this->load->view('templates/admin/footer_tbl');
	}

	public function edit($id = null)
		{
			if(is_null($id)){
				redirect(base_url('admin/data_lansia'));
				exit();
			}

			if(isset($_POST['btn-edit'])){

				$dt_post = $this->input->post();
				$data = [
					'nama' => $dt_post['nama'],
					'tgl_lahir' => $dt_post['tgl_lahir'],
					'alamat' => $dt_post['alamat'],
					'NIK' => $dt_post['NIK']
				];

				if(($_FILES['foto_ktp']['name'] != "")){


					$cfg_ktp['upload_path']          = './assets/img/ktp/';
					$cfg_ktp['allowed_types']        = 'jpg|png|jpeg';

					$this->load->library('upload', $cfg_ktp);
					if(!$this->upload->do_upload('foto_ktp')){
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
					    redirect(base_url('admin/data_lansia'));
					    die;
					}else{
					    $data['foto_ktp'] = $this->upload->data('file_name');
					} 

				}

				if(($_FILES['foto_rumah']['name'] != "")){


					$cfg_rumah['upload_path']          = './assets/img/rumah/';
					$cfg_rumah['allowed_types']        = 'jpg|png|jpeg';

					$this->load->library('upload', $cfg_rumah);
					if(!$this->upload->do_upload('foto_rumah')){
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
					    redirect(base_url('admin/data_lansia'));
					    die;
					}else{
					    $data['foto_rumah'] = $this->upload->data('file_name');
					}

				}

				$this->M_DB->edit('tbl_lansia',$data,['id'=>$id]);
				$this->session->set_flashdata('sukses', '
			    	<div class="row w-100">
				    	<div class="alert alert-success w-100" role="alert">
				    	    Data berhasil di ubah!
				    	</div>
				    	</div>
			    ');
			    redirect(base_url('admin/data_lansia'));
			    exit();

			}


			$dt_tbl = $this->M_DB->getWhere('tbl_lansia',['id'=>$id]);

			$op = [
				'method' => 'key',
				'field' => [
					'id' => [
						'use' => false
					],
					'foto_ktp' => [
						'type' => 'file',
						'req' => false,
						'lbl' => 'Foto KTP'
					],
					'foto_rumah' => [
						'type' => 'file',
						'req' => false,
						'lbl' => 'Foto KTP'
					],
					'tgl_lahir' => [
						'type' => 'date',
						'req' => false,
					],
					'status' => [
						'use' => false,
						'req' => false,
					]
				],
				'tags' => [
					'edit' => true
				]
			];
			$data['action'] = base_url('admin/data_lansia/edit/'.$id);
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

			// var_dump($_FILES);die();
			$foto_ktp = '';
			$foto_rumah = '';
		
			$cfg_ktp['upload_path']          = './assets/img/ktp/';
			$cfg_ktp['allowed_types']        = 'jpg|png|jpeg';

			$this->load->library('upload', $cfg_ktp);
			if(!$this->upload->do_upload('foto_ktp')){
				var_dump($this->upload->display_errors());die();
			    $this->session->set_flashdata('message', '

			    <div class="alert alert-danger alert-dismissible fade show" role="alert">
			        <strong>Gagal</strong> '.'Gagal upload file fot ktp.!'.'
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    
			    ');
			    redirect(base_url('admin/data_lansia/tambah'));
			    die;
			}else{
			    $foto_ktp = $this->upload->data('file_name');          
			} 

			$cfg_rumah['upload_path']          = './assets/img/rumah/';
			$cfg_rumah['allowed_types']        = 'jpg|png|jpeg';

			$this->load->library('upload', $cfg_rumah);
			if(!$this->upload->do_upload('foto_rumah')){
				var_dump($this->upload->display_errors());die();
			    $this->session->set_flashdata('message', '

			    <div class="alert alert-danger alert-dismissible fade show" role="alert">
			        <strong>Gagal</strong> '.'Gagal upload file foto rumah.!'.'
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    
			    ');
			    redirect(base_url('admin/data_lansia/tambah'));
			    die;
			}else{
			    $foto_rumah = $this->upload->data('file_name');          
			}   

			    $data_post = $this->input->post();
			    $data = [
			    	'nama' => $data_post['nama'],
			    	'tgl_lahir' => $data_post['tgl_lahir'],
			    	'alamat' => $data_post['alamat'],
			    	'foto_ktp' => $foto_ktp,
			    	'NIK' => $data_post['NIK'],
			    	'foto_rumah' => $foto_rumah,
			    	'status' => 'belum'
			    ];

			    $this->M_DB->add('tbl_lansia',$data);
			    $this->session->set_flashdata('sukses', '
			    	<div class="row w-100">
				    	<div class="alert alert-success w-100" role="alert">
				    	    Data berhasil di tambahkan!
				    	</div>
				    	</div>
			    ');
			    redirect(base_url('admin/data_lansia'));
		}
		// echo "string";
		$option = [
			'method' => 'key',
			'field' =>[
				'id' =>[
					'use' => false
				],
				'foto_ktp' => [
					'type' => 'file',

				],
				'foto_rumah' => [
					'type' => 'file',
					'lbl' => 'Foto Rumah' 

				],
				'tgl_lahir' => [
					'type' => 'date',
					'lbl' => 'Tangga' 

				],
				'status' => [
					'use' => false
				]
			]

		];
		$data = [
			'action' => base_url('admin/data_lansia/tambah'),
			'lbl' => 'Tambah Data Lansia'
		];
		$data['input'] = $this->CForm->form_input($this->M_DB->getAll('tbl_lansia')[0],$option);
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/add_data',$data);
		$this->load->view('templates/admin/footer');
	}

	public function delete($id = null){
		if(!is_null($id)){
			$this->M_DB->delete('tbl_lansia',['id'=>$id]);
		    $this->session->set_flashdata('sukses', '
		    	<div class="row w-100">
			    	<div class="alert alert-success w-100" role="alert">
			    	    Data berhasil di hapus!
			    	</div>
			    </div>
		    ');
		}
		
		redirect(base_url('admin/data_lansia'));
	}

}
