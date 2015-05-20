<?php

// Start/resume a session.
//history will have three pararrel arrays
session_start();
if (!isset($_SESSION['startDate'])) {
	$_SESSION['startDate'] = Array();
}
if (!isset($_SESSION['endDate'])) {
	$_SESSION['endDate'] = Array();
}
if (!isset($_SESSION['description'])) {
	$_SESSION['description'] = Array();
}
if (!isset($_SESSION['historyNum'])) {
	$_SESSION['historyNum'] = 0;
}

// first one will represent start date, second: end date, third: description.
// each arrays elements in the same position will represent one previous job description.
// for example, $startdate[0], $endDate[0], and $description[0] will represent one previous job description.
$startDate =& $_SESSION['startDate'];
$endDate =& $_SESSION['endDate'];
$description =& $_SESSION['description'];
$startDateErr = Array();
$endDateErr = Array();
$descriptionErr = Array();
$historyNum =& $_SESSION['historyNum'];



if (isset ( $_GET ['submit'] ))
{
	global $startDate, $endDate, $description, $startDateErr, $endDateErr, $descriptionErr, $historyNum;
	
	$historyNum = $_GET["historyNum"];
	
	for($i = 0; $i <= $historyNum; $i++)
	{
		if (empty($_GET["startDate$i"]))
		{
			$startDateErr[$i] = "Please enter the starting date";
			$startDate[$i] = test_input($_GET["startDate$i"]);
		}
		else
		{
			$startDate[$i] = test_input($_GET["startDate$i"]);
			$startDateErr[$i] = "";
		}
		
		if (empty($_GET["endDate$i"]))
		{
			$endDateErr[$i] = "Please enter the ending date";
			$endDate[$i] = test_input($_GET["endDate$i"]);
		}
		else
		{
			$endDate[$i] = test_input($_GET["endDate$i"]);
			$endDateErr[$i] = "";
		}
		
		if (empty($_GET["description$i"]))
		{
			$descriptionErr[$i] = "Please enter the description of the job";
			$description[$i] = test_input($_GET["description$i"]);
		}
		else
		{
			$description[$i] = test_input($_GET["description$i"]);
			$descriptionErr[$i] = "";
		}
	}	
}

$histories = "";

for ($i = 0; $i <= $historyNum; $i++)
{
	$histories = $histories . "<div id = 'div$i'>"
			."Starting Date: <input type = 'text' name = 'startDate$i' value = '$startDate[$i]'><span class='error'>$startDateErr[$i]</span><br><br>"
			."Ending Date: <input type = 'text' name = 'endDate$i' value = '$endDate[$i]'><span class='error'>$endDateErr[$i]</span><br><br>"
			."Position Description:<br>"
			."<textarea name = 'description$i' rows = '6' cols = '60'>$description[$i]</textarea><span class='error'>$descriptionErr[$i]</span><br><br>"
			."<button type = 'button' onclick='myRemoveChild($i)'>Remove</button><br><br><br></div>";
}

require ('views/historyPage.php');

// this function trim the user input
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


