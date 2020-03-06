<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo @$link ?></title>
</head>
<body onload="printPage()">
	<code class="javascript"><?php echo @$content ?></code>
</body>
<script>
	function printPage()
	{
		window.print();
	}
</script>
</html>