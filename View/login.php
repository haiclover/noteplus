<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
	<style>
		body{
			background: black;
		}
	</style>
</head>
<body>
	<div class="ui two column centered grid" style="margin-top:10rem;">
		<div class="row">
			<div class="ui inverted segment">
				<div class="ui inverted form">
					<form action="/note/check/<?php echo $id ?>" method="POST" class="field">
						<div class="inline field">
							<input type="password" name="password" value="" placeholder="Nhập mật khẩu...">
							<button type="submit" class="ui submit button">Truy cập</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>