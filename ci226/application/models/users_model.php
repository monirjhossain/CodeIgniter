<?php 

	if(! defined('BASEPATH')) exit('No direct script access allowed');

	class Users_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function all_users(){
			return $this->db->get('users');
		}
	}



 ?>