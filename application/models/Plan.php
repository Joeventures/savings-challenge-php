<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Model {

	public $plans;

	public function __construct() {
		parent::__construct();
		if($this->user->current) {
			$id          = $this->user->current->id;
			$this->plans = $this->db->get_where( 'plans', array( 'user_id' => $id ) );
		}
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
			return $this->db->insert('plans', $data);
		}
		return false;
	}

}