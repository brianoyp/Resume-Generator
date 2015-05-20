<!DOCTYPE html>
<html>

<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">

// check if the user inputs are valid. if all the inputs are valide, submit the form
// otherwise, show the error message.
function validateForm()
{
var allValid = true;


var x=document.forms["registerForm"]["name"].value;
if (x==null || x=="")
 	{
 	document.getElementById('nameError').innerHTML = 'Enter your name';
 	allValid = false;
 	}
else
	document.getElementById('nameError').innerHTML = '';
	
var y=document.forms["registerForm"]["login"].value;
if (y==null || y=="")
	{
	document.getElementById('loginError').innerHTML = 'Pick a login name';
	allValid = false;
	}
else
	document.getElementById('loginError').innerHTML = '';

var z=document.forms["registerForm"]["password"].value;
if (z==null || z=="")
	{
	document.getElementById('passwordError').innerHTML = 'Pick a password';
	allValid = false;
	}
else if (z.length < 8)
	{
	document.getElementById('passwordError').innerHTML = 'Password has to be at least 8 characters';
	allValid = false;
	}
else
	document.getElementById('passwordError').innerHTML = '';

var w=document.forms["registerForm"]["password2"].value;
if (w==null || w=="")
	{
	document.getElementById('passwordError2').innerHTML = 'Please enter password again to validate it';
	allValid = false;
	}
else if (z != w)
	{
	document.getElementById('passwordError2').innerHTML = 'Two passwords do not match';
	allValid = false;
	}
else
	document.getElementById('passwordError2').innerHTML = '';

if (allValid)
	document.forms["registerForm"].submit();
}

</script>
</head>

<body>

<h2>Register</h2>

<p>Please use the form below to register for this site.</p>

<form name="registerForm" method="post" action="">

<p><label for="name">Name</label> 
<input type="text" name="name" value="<?php sticky('name') ?>"size=30/>
<span class='error' id='nameError'></span></p>

<p><label for="login">Login name</label> 
<input type="text" name="login" value="<?php sticky('login') ?>"size=30/>
<span class='error' id='loginError'><?php echo($loginError) ?></span></p>

<p><label for="password">Password</label>
<input type="password" name="password" size="30"/>
<span class='error' id='passwordError'></span></p>

<p><label for="password2">Password (confirmation)</label>
<input type="password" name="password2" size="30"/>
<span class='error' id='passwordError2'></span></p>

<input type='hidden' name='hidden' value='Hidden'/>

<button type="button" onclick="validateForm()">Submit</button>
<a href="<?php echo ($_SESSION['origin'])?>">Cancel</a>

</form>

</body>

</html>