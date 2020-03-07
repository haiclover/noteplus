<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Note Plus</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/form.min.css" integrity="sha256-6tf0AClYiuHJlBUGu5WshPdGrW7hGecAfPADkTlGyiY=" crossorigin="anonymous" />
</head>
<body>
	<div class="ui hidden divider"></div>
	<div class="ui two column centered grid">
		<div class="row">
			<form class="ui form column" action="/home/store" method="POST">
				<div class="field">
					<label for="content">Nội dung: </label>
					<textarea name="content" required=""></textarea>
				</div>
				<div class="field">
					<label for="name">Tên / Tiêu đề: </label><input type="text" name="name" max="45" required="">
				</div>
				<div class="field">
					<label for="password">Mật Khẩu</label>
					<input type="password" name="password">
				</div>
				<div class="field">
					<label for="syntax">Ngôn ngữ</label>
					<select name="syntax" class="" required="">
						<?php foreach ($languages as $key => $value): ?>
						<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="ui one column centered grid">
					<div class="row">
						<button class="ui button" type="submit">Lưu</button>
					</div>
				</div>
			</form>
		</div>
		<?php if (isset($alert,$status,$link)) : ?>
		<div class="row">
			<div class="ui one column center aligned grid">
				<div class="ui <?php echo @$status ?> message">
				  <i class="close icon"></i>
				  <div class="header">
				    <?php echo @$alert; ?>
				  </div>
				  <p><a href="<?php echo @$link ?>"><?php echo @$link ?></a></p>
				</div>
			</div>
		</div>
		<?php endif ?>
	</div>

</body>
</html>