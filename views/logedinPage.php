<!DOCTYPE html>
<html>
<head>
<title>Loged in</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Loged in</h2>

<p>Welcome Back!</p>

<a href="<?php echo ($_SESSION['caller'] . "?origin=" . $_SESSION['origin']) ?>">Go Back</a>

</body>
</html>