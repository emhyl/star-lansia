<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['bulan_ini']= $this->CForm->time_now('m');
		$data['bantuan_sekarang'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['bulan' => $data['bulan_ini'], 'status' => 'terima']);
		$data['bantuan_selesai'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['status'=>'selesai']);
		$data['list_lansia'] = $this->M_DB->getAll('tbl_lansia');
		$data['list_anggota'] = $this->M_DB->getAll('tbl_komunitas');
		// var_dump($data['bantuan_sekarang']);die();
	
		$this->load->view('templates/user/header',['active' => 'home']);
		$this->load->view('index',$data);
		$this->load->view('templates/user/footer');
	}

	public function profil()
		{
			// redirect(base_url('admin/home'));
			$this->load->view('templates/user/header',['active' => 'profil']);
			$this->load->view('profil');
			$this->load->view('templates/user/footer');
		}
	public function donasi()
		{
			$data['donasi'] = $this->M_DB->getWhere('tbl_donasi',['id'=>1]);

			// redirect(base_url('admin/home'));
			$this->load->view('templates/user/header',['active' => 'donasi']);
			$this->load->view('donasi',$data);
			$this->load->view('templates/user/footer');
		}
	public function galeri()
			{
				$data['galeri'] = $this->M_DB->getAll('tbl_galeri');

				// redirect(base_url('admin/home'));
				$this->load->view('templates/user/header',['active' => 'galeri']);
				$this->load->view('galeri',$data);
				$this->load->view('templates/user/footer');
			}

}
