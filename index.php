<?php
	if ( isset($_GET['action']) && $_GET['action'] ) $action = $_GET['action'];
	else $action = 'form';
?>
<!doctype html>
<html>
<head>
	<meta charset='utf-8'>
	<link type='text/css' href='theme.css' rel='stylesheet' />
	<script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
</head>
<body>
<?php
	include 'language.php';
	
	include $action.'.php';
	
?>

<script>
		var $ = jQuery;
		var resize_count = 0;
		$(window).load(function () {
			resize_iframe();
		});
		$(function(){
			//resize_iframe();
			setTimeout(function () { resize_iframe(); }, 500);	// resize after 1 second for sure.
			setTimeout(function () { resize_iframe(); }, 3000);	// resize after 3 seconds for sure.
			setTimeout(function () { resize_iframe(); }, 5000);	// resize after 5 seconds for sure.
			setTimeout(function () { resize_iframe(); }, 15000);	// resize after 15 seconds for sure.
			//setTimeout(function () { resize_iframe(); }, 30000);	// resize after 30 seconds for sure.
			setTimeout(function () { resize_iframe(); }, 60000);	// resize after 1 MINUTE for sure.
			// if it takes more than 1 minute, then let's assume that the internet is too slow.
		});
		function resize_iframe()
		{
			resize_count ++;
			var height = $(document).height();
			var data = { 'code' : 'resize', 'height': height, 'count': resize_count };
			parent.postMessage( data, '*' );
		}
	</script>
</body>
</html>
