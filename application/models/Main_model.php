<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_model extends MY_Model
{
    public function getStates($country_id)
	{
		return array_map(function($arr){
			return	[
				'id' => e_id($arr['id']),
				'name' => $arr['name']
			];
		}, $this->db->select('id, name')
					->from('states')
					->where(['country_id' => $country_id])
					->where(['is_deleted' => 0])
					->get()->result_array());
	}
	
	public function getCities($state_id)
	{
		return array_map(function($arr){
			return	[
				'id' => e_id($arr['id']),
				'name' => $arr['name']
			];
		}, $this->db->select('id, name')
					->from('cities')
					->where(['state_id' => $state_id])
                    ->where(['is_deleted' => 0])
					->get()->result_array());
	}

	public function getCategory()
	{
		return array_map(function($arr){
			$arr['id'] = e_id($arr['id']);
			return	$arr;
		}, $this->db->select('id, cat_name, price')
						->from('category')
						->where(['is_deleted' => 0])
						->get()->result_array());
	}

	public function getPapers($cat_id)
	{
		return array_map(function($arr){
			$arr['e_id'] = e_id($arr['id']);
			return	$arr;
		}, $this->db->select('id, DATE_FORMAT(e_date, "%d-%m-%Y") e_date')
						->from('exam_table')
						->where(['e_date >=' => date('Y-m-d')])
						->where(['cat_id' => $cat_id, 'is_deleted' => 0])
						->get()->result_array());
	}

	public function getLang($e_id)
	{
		return array_map(function($arr){
			$arr['lang_id'] = e_id($arr['lang_id']);
			return	$arr;
		}, $this->db->select('lang_id, language')
						->from('exam_lang el')
						->where(['et_id' => $e_id])
						->join('language l', 'el.lang_id = l.id')
						->get()->result_array());
	}

	public function register()
	{	
		$post = [
			'name'      	=> $this->input->post('name'),
			'email'     	=> $this->input->post('email'),
			'address'   	=> $this->input->post('address'),
			'country'   	=> d_id($this->input->post('country')),
			'state'     	=> d_id($this->input->post('state')),
			'city'      	=> d_id($this->input->post('city')),
			'dob'       	=> date('Y-m-d'),
			'mobile'    	=> $this->input->post('mobile'),
			'mobile_alter'  => $this->input->post('mobile_alter'),
			'password'  	=> my_crypt($this->input->post('password')),
			'exam_cat'  	=> d_id($this->input->post('exams'))
		];

		$this->db->trans_start();
		$this->db->insert('register', $post);
		$auth = $this->db->insert_id();
		
		$payment = [
			'u_id'         => $auth,
			'order_id'     => $this->input->post('order_id'),
			'tracking_id'  => $this->input->post('payment_id'),
			'bank_ref_no'  => $this->input->post('signature'),
			'order_status' => "Success",
			'amount'       => $this->input->post('amount') ? $this->input->post('amount') : 100,
			'exam'         => d_id($this->input->post('exam_date')),
			'exam_lang'    => d_id($this->input->post('exam_lang')),
			'created_at'   => date('Y-m-d H:i:s'),
			'exam_board'   => $this->input->post('board'),
		];
		
        $this->db->insert('payments', $payment);
        
		$invoice['data'] = $this->main->get('exam_table', 'e_time, e_date', ['id' => $payment['exam']]);
		$invoice['data']['language'] = $this->main->check('language', ['id' => $payment['exam_lang']], 'language');
		$invoice['category'] = $this->main->get('category', 'price, cat_name', ['id' => $post['exam_cat']]);
		$invoice['category']['extra'] = 0;
		$invoice['data']['exam_board'] = $payment['exam_board'];

		$this->db->trans_complete();
		
        if ($this->db->trans_status() == true){
			$subject = 'Registration details';
    		$message = $this->load->view('partials/invoice', $invoice, true);

    		// send_email($post['email'], $message, $subject);
			return ['redirect' => base_url('thankyou')];
		}else
			return ['message' => "Registration not successfull. Try again later."];
	}
}