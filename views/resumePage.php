<?php 
include ('application/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Resume</title>

</head>

<?php 
makeLogin();
?>

<h1>Resume</h1>

<h4>Contacts</h4>
<table>
<tr><td><p>Name: <?php echo($name)?></p></td></tr>

<tr><td><p>Address: <?php echo($address)?></p></td></tr>

<tr><td><p>Phone Number: <?php echo($phoneNumber)?></td></tr>
</table>
<br><br>

<h4>Description of the job desired </h4>
<p><?php echo($position)?></p>

<br><br>

<h4>Employment History</h4>
<table>
<?php echo($histories)?>
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

<?php 
linkAdd();
?>

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