<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function go() {
		$creds = $this->input->post(array('email', 'password'),TRUE);
		$this->user->login($creds['email'], $creds['password']);
		redirect('/');
	}

	public function stop() {
		$this->session->sess_destroy();
		redirect('/');
	}

	public function newacct() {
		$creds = $this->input->post( array('name', 'email', 'password'), TRUE);
		$this->user->create($creds);
		redirect('/');
	}
}