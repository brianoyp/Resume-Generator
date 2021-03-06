<?php
session_start();
if (!isset($_REQUEST['hidden']))
	$_SESSION['origin'] = $_SERVER['HTTP_REFERER'];

if (!isset($_SESSION['origin']) && ($_SESSION['origin'] == null || $_SESSION['origin'] ==''))
	$_SESSION['origin'] = 'index.php';

require 'application/db.php';
require 'application/authentication.php';
require 'application/functions.php';

// Use HTTPS
//redirectToHTTPS();

$loginError = '';

if (isset($_REQUEST['name']) && isset($_REQUEST['password']) && isset($_REQUEST['login'])) {

	$name = trim($_REQUEST['name']);
	$login = trim($_REQUEST['login']);
	$password = trim($_REQUEST['password']);

	// Register user if name, login, and password are provided
	$isAdmin = isset($_REQUEST['admin']);
	
	if (registerNewUser($name, $login, $password)) {
		require 'views/registeredPage.php';
		return;
	}
	else {
		$loginError = 'That login name is already in use';
		require 'views/registerPage.php';
		return;
	}
}
else {
	require 'views/registerPage.php';
}
?>