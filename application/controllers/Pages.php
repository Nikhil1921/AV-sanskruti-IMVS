<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function thankyou()
	{
		$data['title'] = 'Thank you';
        $data['name'] = 'thankyou';

		return $this->template->load('template', 'pages/thankyou', $data);
	}
}