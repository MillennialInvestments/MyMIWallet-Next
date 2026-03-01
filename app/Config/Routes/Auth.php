<?php

$routes->get('Login', 'AuthController::login');
$routes->post('Login', 'AuthController::attemptLogin');
$routes->get('Register', 'AuthController::register');
$routes->post('Register', 'AuthController::attemptRegister');
$routes->get('Logout', 'AuthController::logout');
$routes->get('Forgot-Password', 'AuthController::forgotPassword');
$routes->post('Forgot-Password', 'AuthController::attemptForgot');
$routes->get('Reset-Password', 'AuthController::resetPassword');
$routes->post('Reset-Password', 'AuthController::attemptReset');
