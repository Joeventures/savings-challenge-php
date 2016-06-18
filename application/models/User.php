<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	public $current;

	public function __construct() {
		parent::__construct();
		$this->current = $this->session->userdata('loggedin');
	}

	public function get($user) {
		$this->db->from('users');
		$this->db->where('email', $user);
		return $this->db->get()->row();
	}

	public function login($user, $password) {
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $user);
		$hash = $this->db->get()->row('password');
		if ($this->verify_password($password, $hash)) {
//			echo '<pre>'.print_r($this->get($user),true).'</pre>';
			$name = $this->get($user)->name;
			$this->session->set_userdata('loggedin', $name);
			return true;
		}
		return false;
	}

	public function create($user_info) {
		$user_info['password'] = $this->hash_password($user_info['password']);
		return $this->db->insert('users', $user_info);
	}

	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	private function verify_password($password, $hash) {
		return password_verify($password, $hash);
	}
}