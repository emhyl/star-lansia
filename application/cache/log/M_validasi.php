<?php
class M_validasi extends CI_Model
{
	private $_table = "tbl_login";

	public function rules()
	{
		return [
			[
				'field' => 'username', 
				'label' => 'Username', 
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'password', 
				'label' => 'Password', 
				'rules' => 'required||max_length[32]'
			]
		];
	}

	// ... ada kode lain di sini ...
}