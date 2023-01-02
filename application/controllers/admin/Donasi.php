<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('admin')){
			redirect(base_url('admin/login'));
		}		
	}

	public function index()
	{

		$data['list'] = $this->M_DB->getAll('tbl_donasi');

		// $data['list'] = $this->M_DB->getAll('tbl_komunitas');
		$this->load->view('templates/admin/header_tbl');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/donasi',$data);
		$this->load->view('templates/admin/footer_tbl');
	}

	public function edit($id = null)
		{
			if(is_null($id)){
				redirect(base_url('admin/donasi'));
				exit();
			}

			if(isset($_POST['btn-edit'])){

				$dt_post = $this->input->post();
				$data = [
					'no_rek' => $dt_post['no_rek'],
					'atas_nama' => $dt_post['atas_nama']
				];
				$this->M_DB->edit('tbl_donasi',$data,['id'=>$id]);
				$this->session->set_flashdata('sukses', '
			    	<div class="row w-100">
				    	<div class="alert alert-success w-100" role="alert">
				    	    Data berhasil di ubah!
				    	</div>
				    	</div>
			    ');
			    redirect(base_url('admin/donasi'));
			    exit();

			}


			$dt_tbl = $this->M_DB->getWhere('tbl_donasi',['id'=>$id]);

			$op = [
				'method' => 'key',
				'field' => [
					'id' => [
						'use' => false
					]
				],
				'tags' => [
					'edit' => true
				]
			];
			$data['action'] = base_url('admin/donasi/edit/'.$id);
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
			$data = [
				'no_rek' => $this->input->post('no_rek'),
				'atas_nama' => $this->input->post('atas_nama')
			];
			$this->M_DB->add("tbl_donasi",$data);
			redirect(base_url('admin/donasi'));
			exit();			
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
			'action' => base_url('admin/donasi/tambah'),
			'lbl' => 'Tambah Data Donasi'
		];
		$data['input'] = $this->CForm->form_input($this->M_DB->getAll('tbl_donasi')[0],$option);
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/add_data',$data);
		$this->load->view('templates/admin/footer');
	}

	public function delete($id = null){
		if(!is_null($id)){
			$this->M_DB->delete('tbl_donasi',['id'=>$id]);
		    $this->session->set_flashdata('sukses', '
		    	<div class="row w-100">
			    	<div class="alert alert-success w-100" role="alert">
			    	    Data berhasil di hapus!
			    	</div>
			    </div>
		    ');
		}
		
		redirect(base_url('admin/donasi'));
	}

}
