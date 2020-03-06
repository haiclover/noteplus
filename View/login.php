<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password</title>
</head>
<body>
	<form action="/note/check/<?php echo $id ?>" method="POST">
		<input type="password" name="password" value="" placeholder="">
		<button type="submit">Truy cập</button>
	</form>
</body>
</html>