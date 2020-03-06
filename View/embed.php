<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Embed</title>
	<style>
		#code_box{
			background-color: #F7F7F7;
		    border: 1px solid #ddd;
		    border-radius: 3px;
		    font-size: 12px;
		    overflow: auto;
		    white-space: pre;
		    margin: 10px;
		    padding: 7px 15px;
		}
	</style>
</head>
<body>
	<h4 style="text-align: center;">Iframe Embedding</h4>
	<div id="code_box"><?php highlight_string('<iframe src="' . @$link . ' style="border:none;width:100%"></iframe>'); ?>
	</div>
</body>
</html>