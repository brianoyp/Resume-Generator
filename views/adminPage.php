<?php 
include ('application/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Administration</title>
</head>

<body>

<?php 
makeLogin();
?>

<h1>Administraion</h1>

<table style="width:500px">
<tr align="left">
  <th>UserId</th>
  <th>Name</th>		
  <th>Role</th>
</tr>
<?php 
echo($tableContent)
?>
</table>

<br><br><br>
<h3> Navigation Links: </h3>
<p> You can navigate this webpage, or clear the information with below links.</p>
<table class = "navigation" >

<tr>

<td>
<a href = "index.php">Home</a>
</td>

<td>
<a href= "contact.php">Contact information</a>
</td>

<td>
<a href = "position.php">Position Sought</a>
</td>

<td>
<a href= "history.php">Employment History</a>
</td>

<td>
<a href = "resume.php">Resume Preview</a>
</td>

<td>
<a href = 'archive.php'>Archive</a>
</td>

<td>
<a href = "clear.php">Clear All Information</a>
</td>

<td>
<a href= "help.php">Help</a>
</td>

</tr>
</table>
</body>
</html>