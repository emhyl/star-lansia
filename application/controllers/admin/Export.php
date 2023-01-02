<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	
	public function terima() {
		$data['laporan'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['status' => 'terima']);
		$data['label'] = "YANG MENERIMA BANTUAN";
	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'laporan.pdf';
	    $this->pdf->load('admin/view_laporan', $data);

	}
	public function selesai() {

		$data['laporan'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['status' => 'selesai']);

		$data['label'] = "YANG SELESAI MENERIMA BANTUAN";
	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'laporan.pdf';
	    $this->pdf->load('admin/view_laporan', $data);

	}
	public function belum() {

		$data['laporan'] = $this->M_DB->join2tbl('*',['tbl_bantuan','tbl_lansia'],['id_lansia','id'],['status' => 'belum']);

		$data['label'] = "YANG BELUM MENERIMA BANTUAN";
	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'laporan.pdf';
	    $this->pdf->load('admin/view_laporan', $data);

	}

}
