<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;

class Rest_user extends REST_Controller {


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
	$user = $this->db->get('user')->result();
} else {
	$this->db->where('id', $id);
	$user = $this->db->get('user')->result();
  }
   $this->response($user, 200);
 }
  function index_post() 
  {

    $data = array(
'iduser' => $this->post('iduser'),
'nama' => $this->post('nama'),
'profesi' => $this->post('profesi'),
'email' => $this->post('email'),
'password' => $this->post('password'),
'role_id' => $this->post('role_id'),
'id_active' => $this->post('id_active'),
'tanggal_input' => $this->post('tanggal_input'),
'modified' => $this->post('modified')
);

$insert = $this->db->insert('user', $data);
if ($insert) {
$this->response($data, 200);
} else {
$this->response(array('status' => 'fail', 502));
}
}
function index_put() {
$id = $this->put('user');
$data = array(
'iduser' => $this->put('iduser'),
'nama' => $this->put('nama'),
'profesi' => $this->put('profesi'),
'email' => $this->put('email'),
'password' => $this->put('password'),
'role_id' => $this->put('role_id'),
'id_active' => $this->put('id_active'),
'tanggal_input' => $this->put('tanggal_input'),
'modified' => $this->put('modified'));
$this->db->where('user', $id);
$update = $this->db->update('user', $data);
if ($update) {
$this->response($data, 200);
} else {
$this->response(array('status' => 'fail', 502));
  
}
}
  function index_delete() {
$id = $this->delete('user');
$this->db->where('user', $id);
$delete = $this->db->delete('user');
if ($delete) {
$this->response(array('status'=>'sukses'), 200);
} else {
$this->response(array('status' => 'gagal', 502));
}
}

}
?>