<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'main');
	}

	public function error_404()
	{
		$data['title'] = 'Error 404';
        $data['name'] = 'Error 404';

		return $this->template->load('template', 'error_404', $data);
	}

	public function getStates()
	{
		check_ajax();
		
		$response = [
			'message' => $this->main->getStates(d_id($this->input->get('country_id'))),
			'status' => true
		];
		
		die(json_encode($response));
	}
	
	public function getCities()
	{
		check_ajax();
		
		$response = [
			'message' => $this->main->getCities(d_id($this->input->get('state_id'))),
			'status' => true
		];

		die(json_encode($response));
	}
	
	public function getPapers()
	{
		check_ajax();
		
		$response = [
			'message' => $this->main->getPapers(d_id($this->input->get('cat_id'))),
			'status' => true
		];

		die(json_encode($response));
	}
}