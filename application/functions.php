<?php
function makeLogin()
{
	if (isset($_SESSION['login']))
	{
		$realName = $_SESSION['realname'];
		echo("<p class='login'>$realName | <a href ='logout.php' class='login'>Log out</a><br></p>");
	}
	
	else
	{
		echo("<a href='login.php' class='login'>Log in</a> | <a href='register.php' class='login'>Register</a><br>");
	}
}

// Echoes a parameter value if it exists
function sticky ($name) {
	if (isset($_REQUEST[$name])) {
		echo $_REQUEST[$name];
	}
}

function linkAdd()
{
	if (isset($_SESSION['login']))
	{
		echo("<td><a href = 'archive.php'>Archive</a></td>");
	}
	
	if (isset($_SESSION['login']) && in_array('admin', $_SESSION['roles']))
	{
		echo("<td><a href = 'admin.php'>Administration</a></td>");
	}
}
?>