<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;

class Rest_kategori_motivasi extends REST_Controller {


   function __construct($config = 'rest'){
            parent::__construct($config);
			$this->load->database();
        }

    function index_get() {
	// Deskripsi Fungsi :
	// ----------------------------------------------------------------------------------
	// Script dibawah ini merupakan implementasi dari metode GET
	// ----------------------------------------------------------------------------------
	$id = $this->get('id');
	if ($id == '') {
	$motivasi = $this->db->get('kategori_motivasi')->result();
} else {
	$this->db->where('id', $id);
	$user = $this->db->get('kategori_motivasi')->result();
  }
   $this->response($motivasi, 200);
 }
  function index_post() 
  {

    $data = array(
'id' => $this->post('id'),
'kategori' => $this->post('kategori')
);

$insert = $this->db->insert('kategori_motivasi', $data);
if ($insert) {
$this->response($data, 200);
} else {
$this->response(array('status' => 'fail', 502));
}
}
function index_put() {
$id = $this->put('id');
$data = array(
'id' => $this->put('id'),
'kategori' => $this->put('kategori')
);
$this->db->where('id', $id);
$update = $this->db->update('kategori_motivasi', $data);
if ($update) {
$this->response($data, 200);
} else {
$this->response(array('status' => 'fail', 502));
  
}
}
  function index_delete() {
$id = $this->delete('id');
$this->db->where('id', $id);
$delete = $this->db->delete('kategori_motivasi');
if ($delete) {
$this->response(array('status'=>'sukses'), 200);
} else {
$this->response(array('status' => 'gagal', 502));
}
}

}
?>