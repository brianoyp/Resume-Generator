<!DOCTYPE html>
<html>

<head>
<title>Please Log In</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Please Log In</h2>

<p style="color:red"><?php echo $message ?></p>

<form method="post">

<table>
<tr><td><label for="username">Username</label></td>
    <td><input type="text" size="20" name="username" id="username"/></td></tr>
    
<tr><td><label for="password">Password</label></td>
    <td><input type="password" size="20" name="password" id="password"/></td></tr>
    
<tr><td colspan="2"><input type="submit" name='submit' value="Submit"/></td>
</table>
<a href="<?php echo ($_SESSION['origin'])?>">Cancel</a>

</form>

</body>
</html>
