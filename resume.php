<?php
session_start();
if (!isset($_SESSION['contacts'])) {
	$_SESSION['contacts'] = array("name"=>"", "address"=>"", "phoneNumber"=>"");
}

$name = $_SESSION['contacts']["name"];
$address = $_SESSION['contacts']["address"];
$phoneNumber = $_SESSION['contacts']["phoneNumber"];

if (!isset($_SESSION['position'])) 
	$position = "";
else
	$position = $_SESSION['position'];

// first one will represent start date, second: end date, third: description.
// each arrays elements in the same position will represent one previous job description.
// for example, $startdate[0], $endDate[0], and $description[0] will represent one previous job description.
if (!isset($_SESSION['startDate'])) 
	$startDate = Array();
else 
	$startDate = $_SESSION['startDate'];

if (!isset($_SESSION['endDate'])) 
	$endDate = Array();
else 
	$endDate = $_SESSION['endDate'];

if (!isset($_SESSION['description'])) 
	$description = Array();
else 
	$description = $_SESSION['description'];

if (!isset($_SESSION['historyNum'])) 
	$historyNum = 0;
else 
	$historyNum = $_SESSION['historyNum'];

$histories = "";

for ($i = 0; $i <= $historyNum; $i++)
{
	$histories = $histories . "<div id = 'div$i'>"
	."$startDate[$i] ~ $endDate[$i]<br>"
	."$description[$i]<br><br></div>";
}

require ('views/resumePage.php');
?>