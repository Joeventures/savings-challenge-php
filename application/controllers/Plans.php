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

	public function deposit($payment_id) {
		$this->db->set('complete', true);
		$this->db->set('payment_date', date('Y-m-d'));
		$this->db->where('id', $payment_id);
		$this->db->update('payments');
		$plan_id = $this->db->get_where('payments', array('id' => $payment_id))->row('plan_id');
		redirect('/plans/'.$plan_id);
	}
}