<?php
session_start();

require ('application/db.php');

//validate logined user. if user is not logged in, take user to login page.
if (!isset($_SESSION['login']))
{
	if (!isset($_SERVER['HTTP_REFERER']))
		$_SERVER['HTTP_REFERER'] = "index.php";
	header("Location: login.php?origin=".$_SERVER['HTTP_REFERER']."&caller=archive.php");
}

else
{
	$resumeList = '';
	// for loged in user query all resume for the user.
	updateResumeNames($resumeList);
	
	if (!isset($_SESSION['contacts'])) {
		$_SESSION['contacts'] = array("name"=>"", "address"=>"", "phoneNumber"=>"");
	}
	
	
	$resumeName;
	$resumeNameErr;
	$message;
	$messageErr;
	$needUserInput = 0;
	
	if (isset ( $_POST ['submitType'] ))
	{
		global $resumeName, $resumeNameErr, $message, $messageErr;
	
		// if user clicked either 'save', 'load', or 'delete' button....
		if (empty($_POST["resumeName"]))
		{
			$resumeNameErr = "Resume Name is required"; // Resume name is empty
		}
		// else if resume does not consist of between 5 and 20 upper and/or lower case letters ('A'-'Z' and/or 'a'-'z' with no spaces.
		else if (strlen($_POST["resumeName"]) < 5 || strlen($_POST["resumeName"]) > 20 || preg_match("/^[a-zA-Z]+$/", $_POST["resumeName"]) == 0)
		{
			$resumeNameErr = "Resune names should consist of between 5 and 20 upper and/or lower case letters ('A'-'Z' and/or 'a'-'z' with no spaces).";
		}
		else // user entered valid resume name.
		{
			$resumeName = $_POST["resumeName"];
	
			// user clicked save button
			if ($_POST ['submitType'] == "save")
			{
				if(isResumeNameExist($_POST ['resumeName'], $_SESSION['login']))
				{
					if (isset ( $_POST ['userConfirm'] ) && $_POST ['userConfirm'] == "ok") //user also clicked 'ok' and confirmed that previous user name will be lost.
					{
						// need to delete the previous resume
						deleteResume($_POST ['resumeName'], $_SESSION['login']);
						//save the new resume
						saveResume();
						$message = "The previous data was deleted and the new data has been saved..";
					}
					else
					{
						$needUserInput = 1; // if this is true, javascript will be fired and pop up window will ask user if it is ok to lose previous data.
					}
				}
				else
				{
					// save all new data
					saveResume();
					$message = "New data has been saved.";
					updateResumeNames($resumeList);
				}
			}
	
			// user clicked load button
			else if ($_POST ['submitType'] == "load")
			{
				if (isResumeNameExist($_POST ['resumeName'],$_SESSION['login']))
				{
					loadResume();
					$message = "The data has been loaded.";
				}
				else
					$messageErr = "Load failed: There is no such resume name in the database.";
			}
	
			// user clicked delete button
			else if ($_POST ['submitType'] == "delete")
			{
				if (isResumeNameExist($_POST ['resumeName'],$_SESSION['login']))
				{
					deleteResume($_POST ['resumeName'],$_SESSION['login']);
					$message = "Data has been deleted.";
					updateResumeNames($resumeList);
				}
				else
					$messageErr = "Delete failed: There is no such resume name in the database.";
			}
	
		}
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
	
	//if resumeList is empty, let the user know.
	if($resumeList == null || $resumeList == '')
		$resumeList = "--There is no resume saved--";
	
	require ('views/archivePage.php');
}

function saveResume()
{
	insertResumeName($_POST["resumeName"],$_SESSION['login']);
	
	$resumeId = getResumeId($_POST["resumeName"],$_SESSION['login']);
	
	//$_SESSION['contacts'] is initialized with three "". "" means nothing and it shouldn't be saved in DB.
	if (isset($_SESSION['contacts']["name"]) && $_SESSION['contacts']["name"] != "")
		insertName($_SESSION['contacts']["name"], $resumeId);

	if (isset($_SESSION['contacts']["address"]) && $_SESSION['contacts']["address"] != "")
		insertAddress($_SESSION['contacts']["address"], $resumeId);

	if (isset($_SESSION['contacts']["phoneNumber"]) && $_SESSION['contacts']["phoneNumber"] != "")
		insertPhoneNumber($_SESSION['contacts']["phoneNumber"], $resumeId);

	
	if (isset($_SESSION['position'])) 
		insertPosition($_SESSION['position'], $resumeId);
	
	if (isset($_SESSION['historyNum'])) 
	{
		insertHistoryNum($_SESSION['historyNum'], $resumeId);
		insertHistories($_SESSION['historyNum'], $resumeId, $_SESSION['startDate'], $_SESSION['endDate'], $_SESSION['description']);
	}
}

function loadResume()
{
	$resumeId = getResumeId($_POST["resumeName"],$_SESSION['login']);
	$_SESSION['contacts'] = Array();
	$_SESSION['contacts']['name'] = getName($resumeId);
	$_SESSION['contacts']['address'] = getAddress($resumeId);
	$_SESSION['contacts']['phoneNumber'] = getPhoneNumber($resumeId);
	$_SESSION['position'] = "";
	$_SESSION['position'] = getPosition($resumeId);
	$_SESSION['startDate'] = Array();
	$_SESSION['endDate'] = Array();
	$_SESSION['description'] = Array();
	$_SESSION['historyNum'] = 0;
	getHistory($resumeId, $_SESSION['startDate'], $_SESSION['endDate'], $_SESSION['description'], $_SESSION['historyNum']);
}
?>