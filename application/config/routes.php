<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;

$route['register']['post'] = 'home/register';
$route['thankyou'] = 'pages/thankyou';
$route['about-scholarship'] = 'pages/about_scholarship';
$route['why-av-sanskruti-sanstha'] = 'pages/why_av_sanskruti_sanstha';
$route['syllabus'] = 'pages/syllabus';
$route['supporters'] = 'pages/supporters';
$route['how-to-apply'] = 'pages/how_to_apply';
$route['contact'] = 'pages/contact';