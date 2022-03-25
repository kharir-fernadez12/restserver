<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;

class Rest_role extends REST_Controller {


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
	$role = $this->db->get('role')->result();
} else {
	$this->db->where('id', $id);
	$role = $this->db->get('role')->result();
  }
   $this->response($role, 200);
 }
  function index_post() 
  {

    $data = array(
'id' => $this->post('id'),
'role' => $this->post('role')
);

$insert = $this->db->insert('role', $data);
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
'role' => $this->put('role')
);
$this->db->where('id', $id);
$update = $this->db->update('role', $data);
if ($update) {
$this->response($data, 200);
} else {
$this->response(array('status' => 'fail', 502));
  
}
}
  function index_delete() {
$id = $this->delete('id');
$this->db->where('id', $id);
$delete = $this->db->delete('role');
if ($delete) {
$this->response(array('status'=>'sukses'), 200);
} else {
$this->response(array('status' => 'gagal', 502));
}
}

}
?>