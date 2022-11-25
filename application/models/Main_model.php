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
			$arr['id'] = e_id($arr['id']);
			return	$arr;
		}, $this->db->select('id, DATE_FORMAT(e_date, "%d-%m-%Y") e_date')
						->from('exam_table')
						->where(['e_date >=' => date('Y-m-d')])
						->where(['cat_id' => $cat_id])
						->where(['is_deleted' => 0])
						->get()->result_array());
	}
}