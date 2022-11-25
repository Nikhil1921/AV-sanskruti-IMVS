<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index()
	{
		$data['title'] = 'Home';
        $data['name'] = 'home';

		return $this->template->load('template', 'home', $data);
	}
}