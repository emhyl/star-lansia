<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		redirect(base_url('admin/home'));
		// $this->load->view('welcome_message');
	}

}
