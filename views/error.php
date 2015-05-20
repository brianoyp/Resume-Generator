<?php 
$previous = $_SERVER['HTTP_REFERER'];
if ($previous == null || $previous == "")
	$previous = 'index.php';
?>
<!DOCTYPE html>
<html>

<head>
<title>Database Error</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<h2>Database Error</h2>

There was a database error.  Here are the particulars:

<p>
<?php echo $exception->getMessage(); ?>
</p>

<?php echo ("<a href= '$previous'>Go Back</a>")?>


</body>
</html>