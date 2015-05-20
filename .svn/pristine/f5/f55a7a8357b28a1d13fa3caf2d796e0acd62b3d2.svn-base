<?php
session_start();
// if login page is called by archive page or admin page, remember those page as origin
if (isset($_REQUEST['origin']))
{
	$_SESSION['origin'] = $_REQUEST['origin'];
	$_SESSION['caller'] = $_REQUEST['caller'];
}
// if login.php is NOT calling itslef, and this is first time coming to login page, update the origin
else if (!isset($_REQUEST['submit']))
{
	//if there is previous page info, update the origin
	if (isset($_SERVER['HTTP_REFERER']))
	{
		$_SESSION['origin'] = $_SERVER['HTTP_REFERER'];
		$_SESSION['caller'] = $_SERVER['HTTP_REFERER'];
	}
	else 
	{
		$_SESSION['origin'] = 'index.php';
		$_SESSION['caller'] = 'index.php';
	}
}
	
require('application/db.php');
require('application/authentication.php');

// Use HTTPS
//redirectToHTTPS();

$message = '';

if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) 
{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		try {
			$DBH = openDBConnection();
		
			// Get the information about the user.  This includes the
			// hashed password, which will be prefixed with the salt.
			$stmt = $DBH->prepare("select RealName, PW from Users where UserId = ?");
			$stmt->bindValue(1, $username);
			$stmt->execute();
		
			// Was this a real user?
			if ($row = $stmt->fetch()) {
		
				// Validate the password
				$hashedPassword = $row['PW'];
				if (computeHash($password, $hashedPassword) == $hashedPassword) {
				//	$_SESSION['userid'] = $row['UserID'];
					$_SESSION['realname'] =
					htmlspecialchars($row['RealName']);
					$_SESSION['login'] = $username;
					$stmt->closeCursor();
					$stmt = $DBH->prepare("select Role from Roles where UserId = ?");
					$stmt->bindValue(1, $username);
					$stmt->execute();
					$roles = array();
					while ($row = $stmt->fetch()) {
						$roles[] = $row['Role'];
					}
					$_SESSION['roles'] = $roles;
					
					require "views/logedinPage.php";	
					
				}
				else {
					$message = "Username or password was wrong";
					require "views/loginPage.php";
				}
			}
			else {
				$message = "Username or password was wrong";
				require "views/loginPage.php";
			}
		}
		catch (PDOException $exception) {
			require "views/error.php";
		}
		changeSessionID();
}
else{
	require('views/loginPage.php');
}
?>