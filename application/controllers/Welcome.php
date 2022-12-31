<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		redirect(base_url('user/home'));
		// $this->load->view('welcome_message');
	}

}
