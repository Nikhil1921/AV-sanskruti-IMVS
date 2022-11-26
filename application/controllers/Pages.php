<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function thankyou()
	{
		$data['title'] = 'Thank you';
        $data['name'] = 'thankyou';

		return $this->template->load('template', 'pages/thankyou', $data);
	}

    public function about_scholarship()
	{
		$data['title'] = 'About Scholarship';
		$data['name'] = 'about_scholarship';
		$data['breadcrumbs'] = 'About Scholarship';

		return $this->template->load('template', 'pages/about_scholarship', $data);
	}

    public function why_av_sanskruti_sanstha()
	{
		$data['title'] = 'Why Av Sanskruti Sanstha';
		$data['name'] = 'why_av_sanskruti_sanstha';
		$data['breadcrumbs'] = 'Why Av Sanskruti Sanstha';

		return $this->template->load('template', 'pages/why_av_sanskruti_sanstha', $data);
	}

    public function syllabus()
	{
		$data['title'] = 'Syllabus';
		$data['name'] = 'syllabus';
		$data['breadcrumbs'] = 'Syllabus';

		return $this->template->load('template', 'pages/syllabus', $data);
	}

    public function supporters()
	{
		$data['title'] = 'Supporters';
		$data['name'] = 'supporters';

		return $this->template->load('template', 'pages/supporters', $data);
	}

    public function how_to_apply()
	{
		$data['title'] = 'How To Apply';
		$data['name'] = 'how_to_apply';
		$data['breadcrumbs'] = 'How To Apply';

		return $this->template->load('template', 'pages/how_to_apply', $data);
	}

    public function contact()
	{
		$data['title'] = 'Contact';
		$data['name'] = 'contact';
		$data['breadcrumbs'] = 'Contact';

		return $this->template->load('template', 'pages/contact', $data);
	}
}