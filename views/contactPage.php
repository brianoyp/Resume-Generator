<?php 
include ('application/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Contract Information</title>
</head>

<body>
<?php 
makeLogin();
?>
<h1>Contact Information</h1>
<p>Please enter your contact information.</p>

<form name = "formContacts" method = "get">

<table>

<tr><td><p>Name: <input type = "text" name = "name" value = "<?php echo($contacts['name'])?>"></p></td><td><span class='error'> <?php echo($nameErr)?></span></td></tr>

<tr><td><p>Address: <input type = "text" name = "address" value ="<?php echo($contacts['address'])?>" size = "60"></p></td><td><span class='error'> <?php echo($addressErr)?></span></td></tr>

<tr><td><p>Phone Number: <input type = "text" name = "phoneNumber" value ="<?php echo($contacts['phoneNumber'])?>" size = "13"></p></td><td><span class='error'> <?php echo($phoneNumberErr)?></span></td></tr>

<tr><td><input type = "submit" name = "submit" value = "Submit"></td><td><a href = "position.php">Next</a><td></tr>

</table>

</form>

<br>

<h3> Navigation Links: </h3>
<p> You can navigate this webpage, or clear the information with below links.</p>

<table class = "navigation" >
<tr>
<td>
<a href = "index.php">Home</a>
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