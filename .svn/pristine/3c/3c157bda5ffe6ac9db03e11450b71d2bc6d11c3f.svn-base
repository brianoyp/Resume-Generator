<?php

// Start/resume a session.  This must be done before any
// output is generated.  Create a cart if necessary.
session_start();
if (!isset($_SESSION['contacts'])) {
	$_SESSION['contacts'] = array("name"=>"", "address"=>"", "phoneNumber"=>"");
}

$contacts =& $_SESSION['contacts'];
$nameErr="";
$addressErr="";
$phoneNumberErr="";


// if the form is submited before....
// need to get the contact infos. name, address, and phone number.
// need to check if the infos are valid.
// shows not valid filed with error message.
// otherwise just show the page with data.
if (isset ( $_GET ['submit'] ))
{
	global $contatcs, $nameErr, $addressErr, $phoneNumberErr;

		if (empty($_GET["name"]))
		{
			$nameErr = "Name is required";
		}
		else
		{
			$contacts["name"] = test_input($_GET["name"]);
		}
		
		if (empty($_GET["address"]))
		{
			$addressErr = "Address is required";
		}
		else
		{
			$contacts["address"] = test_input($_GET["address"]);
		}
		
		if (empty($_GET["phoneNumber"]))
		{
			$phoneNumberErr = "Phone number is required";
		}
		else
		{
			$contacts["phoneNumber"] = test_input($_GET["phoneNumber"]);
		}

}

require ('views/contactPage.php');

// this function trim the user input
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
