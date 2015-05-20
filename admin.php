<?php
session_start();
require ('application/db.php');
// check if the user is logged in, and has admin role. otherwise redirect to login page or error page.
if (!isset($_SESSION['login']))
{
	if (!isset($_SERVER['HTTP_REFERER']))
		$_SERVER['HTTP_REFERER'] = "index.php";
	header("Location: login.php?origin=".$_SERVER['HTTP_REFERER']."&caller=admin.php");
}
// user is logged in but is not an admin, redirect to badrole page with previous page information
else if (!in_array('admin', $_SESSION['roles']))
{
	$originPage = "";
	// only when login page redirected user to admin. login page should not be origin.
	if (isset($_REQUEST['origin']))
		$originPage = $_REQUEST['origin'];
	
	// if previous page info exist
	else if (isset($_SERVER['HTTP_REFERER']))
		$originPage = $_SERVER['HTTP_REFERER'];
	
	else 
		$originPage = 'index.php';
	header("Location: badRole.php?origin=$originPage");
}

// check if administrator want to change somthing
if (isset($_REQUEST['userIdToChage']))
{
	// administrator want to change the role of the user.
	if (isset($_REQUEST['currentRole']))
	{
		if($_REQUEST['currentRole'] == "client")
			changeRole($_REQUEST['userIdToChage'], "admin");
		else
			changeRole($_REQUEST['userIdToChage'], "client");
	}
	
	// administrator want to delete the user
	if (isset($_REQUEST['delete']))
		removeUser($_REQUEST['userIdToChage']);
}




//changeRole($userId, $role);

// get the list of user and role and make table of the list
$DBH = openDBConnection();
$stmt = $DBH->prepare("SELECT Users.UserId, RealName, Role FROM Users, Roles WHERE Users.UserId = Roles.UserID");
$stmt->execute();
$userIds = array();
$realNames = array();
$roles = array();
while ($row = $stmt->fetch()) 
{
	$userIds[] = $row['UserId'];
	$realNames[] = $row['RealName'];
	$roles[] = $row['Role'];
}
	
$tableContent = '';
for ($i = 0; $i < count($userIds); $i++ )
{
	$tableContent .= "<tr><td>$userIds[$i]</td> <td>$realNames[$i]</td> <td>$roles[$i]</td> <td><a href='admin.php?userIdToChage=$userIds[$i]&currentRole=$roles[$i]'>change role</a></td> <td><a href='admin.php?userIdToChage=$userIds[$i]&delete=ture'>delete</a></td></tr>\n";
}
	
require("views/adminPage.php");
?>