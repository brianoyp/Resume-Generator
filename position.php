<?php

// Start/resume a session.  This must be done before any
// output is generated.  Create a cart if necessary.
session_start();
if (!isset($_SESSION['position'])) {
	$_SESSION['position'] = "";
}

$position =& $_SESSION['position'];
$positionErr = "";


if (isset ( $_GET ['submit'] ))
{
	global $position, $positionErr;

		if (empty($_GET["position"]))
		{
			$positionErr = "Please write the description of the job";
		}
		else
		{
			$position = test_input($_GET["position"]);
		}
}

require ('views/positionPage.php');

// this function trim the user input
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

