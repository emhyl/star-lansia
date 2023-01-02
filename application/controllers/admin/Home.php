<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('admin')){
			redirect(base_url('admin/login'));
		}		
	}


	public function index()
	{
		$data['jml_anggota'] = count($this->M_DB->getAll('tbl_komunitas'));
		$data['jml_lansia'] = count($this->M_DB->getAll('tbl_lansia'));
		$data['jml_galeri'] = count($this->M_DB->getAll('tbl_galeri'));

		$data['bulan_ini']= $this->CForm->time_now('m');
		$data['bantuan_sekarang'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['bulan' => $data['bulan_ini'], 'status' => 'terima']);
		$data['bantuan_selesai'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['status'=>'selesai']);
		$data['belum_dapat'] = $this->M_DB->getAllWhere('tbl_lansia',['status'=>'belum']);
		// echo "string";
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/aside');
		$this->load->view('templates/admin/menu_top');
		$this->load->view('admin/index',$data);
		$this->load->view('templates/admin/footer');
	}


	public function export() {

		$data['laporan'] = $this->M_DB->getAllWhere('tbl_lansia',['status'=>'terima']);

	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'laporan.pdf';
	    $this->pdf->load('admin/view_laporan', $data);

	}

	public function logOut(){
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}

}
