<?php

use Dompdf\Dompdf;

class Pdf extends Dompdf {
   public $filename;

   public function __construct(){
       parent::__construct();
       $this->filename  = "laporan.pdf";
   }

   protected function ci(){
       return get_instance();
   }

   public function load($view, $data = array()){
       $html = $this->ci()->load->view($view, $data, true);
       $this->load_html($html);
       $this->render();
       $this->stream($this->filename, array("Attachment" => false));
   }
}