<?php 
session_start();
include ('application/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Resume Generator</title>
</head>

<body>
<?php 
makeLogin();
?>

<h1>Welcome to our Resume Generator WebPage!</h1>

<p>Please click Start, and strat filling out your information.<br><br>
You can nevigate this webpage though Nevigation Links down below.
</p>

<a href = "contact.php">Start!!</a><br><br>

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
<a href = "clear.php">Clear All Information</a>
</td>

<td>
<a href = "help.php">Help</a>
</td>

</tr>
</table>
</body>
</html>