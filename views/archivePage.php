<?php 
include ('application/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Archive</title>

<script>
window.onload = function()
{
	var b = <?php echo($needUserInput)?>;
	
   if(b)
   {
	   var r=confirm("The resume name already exist. if you click OK, The previous data will be lost.");
	   if (r==true)
	   {
			document.getElementById("submitType").value = "save";
		    document.getElementById("userConfirm").value = "ok";
			document.getElementById("resumeForm").submit();
	   }
   }
};

function loadFunction()
{
	var r=confirm("If you load a previous data, unsaved currnet data will be lost.");
	if (r==true)
	{
		document.getElementById("submitType").value = "load";
		document.getElementById("resumeForm").submit();
	}
}

function deleteFunction()
{
	var r=confirm("Do you really want to delete the resume?");
	if (r==true)
	{
		document.getElementById("submitType").value = "delete";
		document.getElementById("resumeForm").submit();
	}
}

function saveFunction()
{
	document.getElementById("submitType").value = "save";
	document.getElementById("resumeForm").submit();
}

</script>
</head>

<?php 
makeLogin();
?>

<h1>Archive</h1>

<br><br>

<h3>Your Saved Resumes</h3>
<table>
<?php echo($resumeList)?>
</table>

<br><br>

<h3>Resume Database</h3>
<p> You can save, load, or delete your resume to database. 
Enter a resume name, then click save, load, or delete button.</p>
<form id = 'resumeForm' name = 'resumeForm' method = 'post'>
Resume name: <input name = 'resumeName' type = 'text' value = '<?php echo $resumeName?>'>
<span class='error'><?php echo($resumeNameErr)?></span><br>
<input type = 'hidden' id = 'submitType' name = 'submitType'>
<input type = 'hidden' id = 'userConfirm' name = 'userConfirm'>
</form> 
<p class='success'><?php echo $message?></p>
<p class='error'><?php echo $messageErr?></p>
<button onclick="saveFunction()">Save</button>
<button onclick="loadFunction()">Load</button>
<button onclick="deleteFunction()">Delete</button>

<br><br>

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

<td>
<a href = "resume.php">Resume Preview</a>
</td>

<?php 
	if (isset($_SESSION['login']) && in_array('admin', $_SESSION['roles']))
	{
		echo("<td><a href = 'admin.php'>Administration</a></td>");
	}
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