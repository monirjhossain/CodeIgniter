<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
// $this->load->helper('security');
		$this->load->model('Users_model');
		$this->load->database();
	}
	function index(){
// redirect('users/view_users');
		$data['query'] = $this->Users_model->all_users();


		$this->load->view('users/view_all_users', $data);

	}

	public function new_user() {
// Load support assets
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters
		('', '<br />');
// Set validation rules
		$this->form_validation->set_rules('first_name', 'First Name','required|min_length[1]|max_length[125]');
		$this->form_validation->set_rules('last_name', 'Last Name','required|min_length[1]|max_length[125]');
		$this->form_validation->set_rules('email', 'Email','required|min_length[1]|max_length[255]|valid_email');
		$this->form_validation->set_rules('is_active','Is Active', 'min_length[1]|max_length[1]|integer|is_natural');
// Begin validation
		if ($this->form_validation->run() == FALSE) {
// First load, or problem with form
			$data['first_name'] = array('name' =>'first_name', 'id' => 'first_name', 'value'=> set_value('first_name', ''),'maxlength' => '100', 'size' => '35');
			$data['last_name'] = array('name' =>'last_name', 'id' => 'last_name', 'value' =>set_value('last_name', ''),'maxlength' => '100', 'size' => '35');
			$data['email'] = array('name' => 'email','id' => 'email', 'value' =>set_value('email', ''),'maxlength' => '100', 'size' => '35');
			$data['is_active'] = array('name' =>'is_active', 'id' => 'is_active','value' => set_value('is_active', '1'));
			$this->load->view('users/new_user',$data);

} else { // Validation passed, now escape the data
	$data = array(
		'first_name' =>$this->input->post('first_name'),
		'last_name' =>$this->input->post('last_name'),
		'email' => $this->input->post('email'),
		'created_date'=> time(),
		'is_active' =>$this->input->post('is_active')
);
	if ($this->Users_model->process_create_user($data)) {
		redirect('users');
	}
}
}

//Edit user

public function edit_user() {
 // Load support assets
 $this->load->library('form_validation');
 $this->form_validation->set_error_delimiters(
 '', '<br />');
 // Set validation rules
 $this->form_validation->set_rules('first_name','First Name','required|min_length[1]|max_length[125]');
 $this->form_validation->set_rules('last_name','Last Name','required|min_length[1]|max_length[125]');
 $this->form_validation->set_rules('email', 'Email','required|min_length[1]|max_length[255]|valid_email');
 $this->form_validation->set_rules('is_active','Is Active', 'min_length[1]|max_length[1]|integer|is_natural');

 if ($this->input->post()) {
 $id = $this->input->post('id');
 } else {
 $id = $this->uri->segment(3);
 }

 // Begin validation
 if ($this->form_validation->run() == FALSE) {
 // First load, or problem with form
 $query = $this->Users_model->get_user_details($id);
 foreach ($query->result() as $row) {
 $first_name = $row->first_name;
 $last_name = $row->last_name;
 $email = $row->email;
 $is_active= $row->is_active;
 }

 $data['first_name'] = array('name' =>'first_name', 'id' => 'first_name','value' => set_value('first_name',$first_name), 'maxlength' => '100','size' => '35');

 $data['last_name'] = array('name' =>'last_name', 'id' => 'last_name','value' => set_value('last_name',$last_name), 'maxlength' => '100','size' => '35');

 $data['email'] = array('name' => 'email','id' => 'email', 'value' =>set_value('email', $email), 'maxlength'=> '100', 'size' => '35');

 $data['is_active'] = array('name' =>'is_active', 'id' => 'is_active','value' => set_value('is_active',$is_active), 'maxlength' => '100','size' => '35');

 $data['id'] = array('id' => set_value('id', $id));
 $this->load->view('users/edit_user', $data);

 } else { // Validation passed, now escape the data
 $data = array(
 'first_name' =>$this->input->post('first_name'),
 'last_name' =>$this->input->post('last_name'),
 'email' => $this->input->post('email'),
 'is_active' =>$this->input->post('is_active')
 );
 if ($this->Users_model->process_update_user($id, $data)) {
 redirect('users');
 }
 }
 }

//Delete user

 public function delete_user() {
 // Load support assets
 $this->load->library('form_validation');
 $this->form_validation->set_error_delimiters(
 '', '<br />');
 // Set validation rules
 $this->form_validation->set_rules('id', 'User ID',
 'required|min_length[1]|max_length[11]|
 integer|is_natural');
 if ($this->input->post()) {
 $id = $this->input->post('id');
 } else {
 $id = $this->uri->segment(3);
 }

 if ($this->form_validation->run() == FALSE) {
 // First load, or problem with form
 $data['query'] =
 $this->Users_model->get_user_details($id);
 $this->load->view('users/delete_user', $data);
 } else {
 if ($this->Users_model->delete_user($id)) {
 redirect('users');
 }
 }
 }
}

?>