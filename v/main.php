<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<?if(isset($css)&& !empty($css)):?>
			<?foreach($css as $style): ?>
				<link href="<?=BASE_URL?>v/css/<?=$style; ?>.css" 
				rel="stylesheet" type="text/css" />
			<?endforeach; ?>
		<?endif;?>
		<?if(isset($scripts)&& !empty($scripts)):?>
			<?foreach($scripts as $script): ?>
				<link href="<?=BASE_URL?>v/js/<?=$script; ?>.js" 
				rel="stylesheet" type="text/css" />
			<?endforeach; ?>
		<?endif;?>
	</head>
	<body>
		<a href="/auth/logout/<?=$uid?>">выйти</a><br/>
		<a href="/apps">приложения</a>|<a href="/users">пользователи</a><br/>
		<hr>
		<?=$content?>
	</body>