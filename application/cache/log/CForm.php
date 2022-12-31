<?php 

class CForm extends CI_Model{

	public function time_now($get=null){
		date_default_timezone_set('Asia/Makassar');
	
		if(!is_null($get)){
			return date("$get");
		
		}else{
			return date('Y-m-d');
		}
	

	}


	public function form_input($data,$options = []){
		$input ='';
				
		if(isset($options['method'])){
			if($options['method'] == 'key'){

				foreach($data as $key => $value){

					$lbl = $key;
					$type = 'text';
					$required = 'required';
					$plc = null;
					$valEdit = "";
					$use = true;
					$select = false;

					if(isset($options['field'][$key]['use'])){
						if($options['field'][$key]['use'] == true){
							$use = true;
						}elseif($options['field'][$key]['use'] == false){
							$use = false;
						}
					}

					if(isset($options['tags'])){
						if(isset($options['tags']['edit'])){
							if($options['tags']['edit'] == true){
								$valEdit = $value;
							}
						}
					}

					if($use){
						if(!empty($options['field'])){

							if(in_array($key, array_keys($options['field']))){
								$tag = $options['field'][$key];
							
								if(isset($tag['plc'])){
									$plc = $tag['plc'];
								}
								if (isset($tag['type'])) {
									$type = $tag['type'];
								}
								if (isset($tag['label'])) {
									$lbl = $tag['label'];
								}
								if (isset($tag['edit'])) {
									$valEdit = $value;
								}
								if (isset($tag['req'])) {
									if(!$tag['req']){
										$required=null;
									}
								}
								if (isset($tag['tag'])) {
									if($tag['tag']['select'] == true){
										$select=true;
									}elseif($tag['tag']['select'] == false){
										$select = false;
									}
								}	
							}
							
						}

						// if(isset($options['tags'])){
						// 	if(isset($options['tags']['edit']) && $options['tags']['edit'] == true){
						// 		$valEdit = $value;
						// 	}
						// }

						if(!$select){
$input .= 
'<div class="form-group">
	<label for="id'.$key.'" class="form-label">'.$lbl.'</label>
	<input type="'.$type.'" class="form-control mb-1" '.$required.' name="'.$key.'" value="'.$valEdit.'" placeholder="'.$plc.'" id="id'.$key.'">
</div>
							';
						}else{
							$input .= '<div class="mb-3">
								<label for="label'.$key.'" class="form-label">'.$lbl.'</label>
								<select id="'.$lbl.'" class="form-select" name="'.$key.'" aria-label="Default select example">';

							$boolSelect = true;	
							foreach($options['field'][$key]['tag']['data'] as $data){

								if(isset($options['field'][$key]['tag']['selected'])){
									if($boolSelect){
										$input .= '<option selected value="'.$options['field'][$key]['tag']['selected'].'">'.$options['field'][$key]['tag']['selected'].'</option>';
										$boolSelect = false;
									}

								}
									$input .= '<option value="'.$data.'">'.$data.'</option>';

							}

							$input .= '</select>
							</div>';
						}
					}//end use
				}
				return $input;
			}elseif($options['method'] == 'num') {

				foreach($data as $value){

					$lbl = $value;
					$type = 'text';
					$required = 'required';
					$plc = $value;
					$use = true;
					$select = false;

					if(isset($options['field'][$value]['use'])){
						if($options['field'][$value]['use']){
							$use = true;
						}elseif($options['field'][$value]['use'] == false){
							$use = false;
						}
					}

					if($use){
						if(!empty($options['field'])){

							if(in_array($value, array_keys($options['field']))){
								$tag = $options['field'][$value];
												
								if(isset($tag['plc'])){
									$plc = $tag['plc'];
								}
								if (isset($tag['type'])) {
									$type = $tag['type'];
								}
								if (isset($tag['label'])) {
									$lbl = $tag['label'];
								}
								if (isset($tag['req'])) {
									if($tag['req'] == false){
										$required=null;
									}
								}
								if (isset($tag['tag'])) {
									if($tag['tag']['select'] == true){
										$select=true;
									}elseif($tag['tag']['select'] == false){
										$select = false;
									}
								}	
							}
							
						}

						if(!$select){
							$input .= '
								<div class="form-group">
								  <label for="id'.$value.'" class="form-label mb-1">'.$lbl.'</label>
								  <input type="'.$type.'" class="form-control" '.$required.' name="'.$value.'" placeholder="'.$plc.'" id="id'.$value.'">
								</div>
							';
						}else{
							$input .= '<div class="mb-3">
								<label for="label'.$value.'" class="form-label">'.$lbl.'</label>
								<select id="'.$lbl.'" class="form-select" name="'.$value.'" aria-label="Default select example">';

							$boolSelect = true;	
							foreach($options['field'][$value]['tag']['data'] as $data){

								if(isset($options['field'][$value]['tag']['selected'])){
									if($boolSelect){
										$input .= '<option selected value="'.$options['field'][$value]['tag']['selected'].'">'.$options['field'][$value]['tag']['selected'].'</option>';
										$boolSelect = false;
									}

								}
									$input .= '<option value="'.$data.'">'.$data.'</option>';

							}

							$input .= '</select>
							</div>';
						}
					}//end use
				}

				return $input;

			}
		}else{
			return 'Error.! masukkan pengaturan input. ';
		}

	}


	public function ser_arr_count(){
		
	}

	public function ascToNum($data,$field){
		$ret = [];
		foreach($data as $row){
			$ret[] = $row[$field];
		}

		return $ret;
	}

	public function c_arr_key_from_data($data,$key = 'id',$field=null){
		$arr = [];
		foreach($data as $row){
			$arr[$row[$key]] = $row[$field];
		}
		return $arr;
	}

	public function set_arr_form_tbl($data){
		$arr = [];
		foreach($data as $row){
			$arr[] = $row;
		}
		return $arr;
	}

	public function waktu(){
		date_default_timezone_set('Asia/Makassar');
		$waktuAwal = strtotime('17:00:00');
		$waktuAkhir = strtotime('18:00:00');
		$waktu = strtotime('+2 hour');
		var_dump(date('Y-m-d H:i:s', $waktu));
		if($waktu>=$waktuAwal and $waktu <= $waktuAkhir){
			echo "waktu anda habis";
		}else{
			echo "waktu belum habis";
		}
	}


	// ===========================================================================================


	public function form_input_add($data,$id=true,$options = []){
		$input = '';
		if($id)unset($data[0]);

		
		foreach($data as $val){
			$type = "text";
			$plc = $val;
			$lbl = $val;
			$required = 'required';

			$select = false;

			if(!empty($options and in_array($val, array_keys($options)))){
				$row = $options[$val];
		
				if(isset($row['plc'])){
					$plc = $row['plc'];
				}
				if (isset($row['type'])) {
					$type = $row['type'];
				}
				if (isset($row['label'])) {
					$lbl = $row['label'];
				}
				if (isset($row['req'])) {
					if(!$row['req']){
						$required=null;
					}
				}
				if (isset($row['select'])) {
					if($row['select'] == true){
						$select=true;
					}
				}	
						
			}

		
			if(!$select){
				$input .= ('
					<div class="mb-3">
					  <label for="label'.$val.'" class="form-label">'.$lbl.'</label>
					  <input type="'.$type.'" class="form-control" '.$required.' name="'.$val.'" placeholder="'.$plc.'" id="label'.$val.'">
					</div>
				');
			}else{
				$input .= '<div class="mb-3">
					<label for="label'.$val.'" class="form-label">'.$lbl.'</label>
					<select class="form-select" name="'.$val.'" aria-label="Default select example">';

				$input .= '	<option selected>'.$options[$val]['selected'].'</option>';

				foreach($options[$val]['data'] as $data){
					$input .= '<option value="'.$data.'">'.$data.'</option>';
				}

				$input .= '</select>
				</div>';
					  
			}

		}
		return $input;
	}

	public function table($data,$id=true,$action = []){
		if(count($data)>0){
			$input = '';
			$th = '';
			$tr = '';

			if($action != null){
				$th .= "<th scope='col'>Action</th>";
			}

			foreach(array_keys($data[0]) as $row){
				if($id == false && $row == 'id'){

				}else{
					$th .= ('
								<th scope="col">'.$row.'</th>');
				}
			}

		
			foreach($data as $row){
				$td = '';
				$tdBool = true;
				foreach($row as $key => $rowTd){
					
					if(!empty($action) && $tdBool == true){
						$td .= '<td><a href="'.$action[0].'/'.$rowTd.'"><i class="bi bi-eraser-fill"></i></a> | <a href="'.$action[1].'/'.$rowTd.'"><i class="bi bi-pencil-square"></i></a></td>';
						$tdBool = false;
					}

					if($id == false && $key == 'id'){

					}else{
						$td .= ('
								<td>'.$rowTd.'</td>
							');
					}
				}

				$tr .= ('
						<tr>
						  '.$td.'
						</tr>
						');
			}

		
			// table-borderless datatable
			$tbl ='
				<div class="table-responsive">
					<table class="table">
					  <thead>
					    <tr>
					     '.$th.'
					    </tr>
					  </thead>
					  <tbody>
					    '.$tr.'
					  </tbody>
					</table>
				</div>
				';

			return $tbl;
		}else{
			return '
				<div class="alert alert-warning" role="alert">
					<li class="notification-item">
					  <i class="bi bi-exclamation-circle text-warning"></i>
					  Kosong.!!
					</li>
				  
				</div>

			';
		}

	}

	public function upl($data = [],$cfg = []){
		$config = [];

		if(!isset($data['method'])){
			$data['method'] = null;
		}
		if(!isset($data['nm_form'])){
			$data['nm_form'] = 'file';
		}
		if(!isset($data['url'])){
			$data['url'] = '';
		}
		if(!isset($data['path'])){
			$data['path'] = '';
		}
		if(!isset($data['msg'])){
			$data['msg'] = 'Silahkan pilih file.!';
		}
		
		if($data['method'] == 'add'){
			if($data['file'][$data['nm_form']]['name'] == ''){
				redirect($base_url().$data['url']);
				die();
			}

		}elseif($data['method'] == 'edit'){
			if($data['file'][$data['nm_form']]['name'] == ''){
				return $data['nm_file'];
				die();
			}

		}

		// var_dump($data['file']);
		// die();
		
		if(!empty($cfg)){
			$config = $cfg;
		}else{
			$extensi = explode('.',$data['file'][$data['nm_form']]['name']);
			$newName = random_string('numeric',8).'.'.end($extensi);
			$config['upload_path'] = './assets/'.$data['path'];
			$config['allowed_types'] = 'jpg|jpeg|png|docx|doc|pdf';
			$config['file_name'] = $newName;
		}

		if(!isset($data['file'])){
			redirect($base_url().$data['url']);
			die();
		}


		
	    $this->load->library('upload', $config);
	    if(!$this->upload->do_upload($data['nm_form'])){
	    	var_dump($this->upload->display_errors());
	    	die();
	        $this->session->set_flashdata('message', '

	        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	            <strong>Gagal</strong> '.$data['msg'].'
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	        
	        ');
	        redirect(base_url().$data['url']);
	        die;
	    }else{
	        return $this->upload->data('file_name');                  

	    } 
		
	}
}
