<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Manila');
$autoload['packages']  = array();
$autoload['libraries'] = array('email', 'session', 'database', 'user_agent');
$autoload['drivers']   = array();
$autoload['config']    = array('custom_config');
$autoload['helper'] = array('url', 'file', 'directory');
$autoload['language']  = array();
$autoload['model']     = array('user_model','vehicle_type_model', 'calculation_model', 'trip_ticket_model', 'driver_model', 'request_model');