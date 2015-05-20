<?php 
session_start();
$previous = $_SERVER['HTTP_REFERER'];
if ($previous == null || $previous == "")
	$previous = 'index.php';

$_SESSION['contacts'] = array("name"=>"", "address"=>"", "phoneNumber"=>"");
$_SESSION['startDate'] = array();
$_SESSION['endDate'] = array();
$_SESSION['description'] = array();
$_SESSION['position'] = "";
$_SESSION['historyNum'] = 0;


include ('application/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Clear</title>
</head>

<body>
<?php 
makeLogin();
?>
		
<h2>All Information is cleared. </h2>
<br>
<?php echo ("<a href= '$previous'>Go Back</a>")?>
<br>
<br>
<h3> Navigation Links: </h3>
<p> You can navigate this webpage, or clear the information with below links.</p>

<table class = "navigation" >
<tr>
<td>
<a href = "contact.php">Contact Information</a>
</td>

<td>
<a href = "position.php">Position Sought</a>
</td>

<td>
<a href = "history.php">Employment History</a>
</td>

<td>
<a href = "resume.php">Resume Preview</a>
</td>

<?php 
linkAdd();
?>

<td>
<a href = "help.php">Help</a>
</td>

</tr>
</table>
</body>
</html>