<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Model {

	public $payments;
	public $total;
	public $id;
	public $progress;

	public function __construct() {
		parent::__construct();
		if($this->id) $this->payments = $this->db->get_where('payments', array('plan_id' => $this->id));
	}

	public function id($id) {
		$this->id = $id;
		if(!$this->payments)
			$this->payments = $this->db->get_where('payments', array('plan_id' => $id));
		if(!$this->total)
			$this->total = $this->db->get_where('plans', array('id' => $id))->row()->total;
		if(!$this->progress)
			$this->progress = $this->progress($this->payments->result_array());
	}

	public function progress($payments) {
		$payments = array_column($payments, 'amount');
		return array_sum($payments);
	}

	public function validate_plan($total) {
		if($total < 1378) {
			$this->session->set_flashdata('danger', 'Your savings goal is too low. Please set a goal higher than $1,378.');
			return false;
		}
		return true;
	}

	public function new_plan($data) {
		if($this->validate_plan($data['total'])) {
			$data['user_id'] = $this->user->current->id;
			$this->session->set_flashdata('success', 'Savings Plan created!');
			$this->db->insert('plans', $data);
			$this->id = $this->db->insert_id();
			$this->total = $data['total'];
			$this->build_payments();
			$this->payments = $this->db->get_where('payments', array('plan_id' => $this->id));
		}
		return false;
	}

	private function build_payments() {
		$inc = ($this->total - 52) / 1326.0;
		$payment = 1;
		$sum_payments = 0;
		for($i = 1; $i <= 51; $i++) {
			$data[] = array(
				'plan_id' => $this->id,
				'amount' => round($payment)
			);
			$sum_payments += $payment;
			$payment += $inc;
		}
		$data[] = array(
			'plan_id' => $this->id,
			'amount' => $this->total - $sum_payments
		);
		$this->db->insert_batch('payments', $data);
	}
}