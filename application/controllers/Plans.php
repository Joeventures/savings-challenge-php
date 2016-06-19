<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Controller {

	public function index() {
		redirect('/');
	}

	public function create() {
		$plan = $this->input->post(array('title', 'total'), TRUE);
		$this->plan->new_plan($plan);
		redirect('/');
	}

	public function get($plan_id) {
		$this->plan->id($plan_id);
		$this->load->view('header');
		$this->load->view('plan');
		$this->load->view('footer');
	}
}