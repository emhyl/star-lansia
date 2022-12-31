<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// if(!$this->session->userdata('user')){
		// 	redirect(base_url('login'));
		// }

		
	}
	public function index()
	{

		$data['bulan_ini']= $this->CForm->time_now('m');
		$data['bantuan_sekarang'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['bulan' => $data['bulan_ini'], 'status' => 'terima']);
		$data['bantuan_selesai'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['status'=>'selesai']);
		// var_dump($data['bantuan_sekarang']);die();
		$this->load->view('templates/admin/header_tbl');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/bantuan',$data);
		$this->load->view('templates/admin/footer_tbl');
	}
	public function selesai($id = null)
		{
			if(is_null($id)){
				redirect(base_url('admin/bantuan'));
				exit();
			}

			$this->M_DB->edit('tbl_lansia',['status' => 'selesai'], ['id'=> $id]);
			// $this->M_DB->delete('tbl_bantuan',['id_lansia'=>$id]);
			redirect(base_url('admin/bantuan'));
		}

	public function tambah()
	{
		if(isset($_POST['add-bantuan'])){
			$id = $this->input->post('id_lansia');
			$dt_lansia = [
				'id_lansia' => $id,
				'bulan' => $this->input->post('bulan'),
			];
			$this->M_DB->add('tbl_bantuan',$dt_lansia);
			$this->M_DB->edit('tbl_lansia',['status' => 'terima'],['id'=>$id]);
			$this->session->set_flashdata('sukses', '
			    	<div class="row w-100">
				    	<div class="alert alert-success w-100" role="alert">
				    	    Berhasil menambahkan bantuan lansia!
				    	</div>
				    	</div>
			    ');
		}

		$data['bantuan_belum'] = $this->M_DB->getAllWhere('tbl_lansia',['status'=>'belum']);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/add_bantuan',$data);
		$this->load->view('templates/admin/footer');
	}

	public function delete($id = null){
		if(is_null($id)){
			redirect(base_url('admin/bantuan'));
			exit();
		}


		$this->M_DB->edit('tbl_lansia',['status' => 'belum'], ['id'=> $id]);
		$this->M_DB->delete('tbl_bantuan',['id_lansia'=>$id]);
		redirect(base_url('admin/bantuan'));

	}

}
