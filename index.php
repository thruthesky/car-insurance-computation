<?php
	if ( isset($_GET['action']) ) $action = $_GET['action'];
	else $action = 'form';
?>
<!doctype html>
<html>
<head>
	<meta charset='utf-8'>
	<link type='text/css' href='theme.css' rel='stylesheet' />
</head>
<body>
<?php
	include 'language.php';
	
	include $action.'.php';
	
?>
</body>
</html>
