<?php
defined('BASEPATH') || exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

// UI
$route['investments/squeeze'] = 'investments/squeeze/index';

// API
$route['api/squeeze/scorecard'] = 'investments/API_Squeeze/scorecard';
$route['api/squeeze/zoomout'] = 'investments/API_Squeeze/zoomout';
$route['api/squeeze/fade'] = 'investments/API_Squeeze/fade';
$route['api/squeeze/run'] = 'investments/API_Squeeze/run';
