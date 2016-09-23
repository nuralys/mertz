<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title_for_layout ?></title>
		<?php if(isset($meta['keywords'])): ?>
			<meta name="keywords" content="<?=$meta['keywords']?>">
		<?php endif; ?>
		<?php if(isset($meta['description'])): ?>
			<meta name="description" content="<?=$meta['description']?>">
		<?php endif; ?>
		<link href="/css/normalize.css" rel="stylesheet" type="text/css">
		<link href="/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/slick.css"/>
		<link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
	</head>
	<?=$this->element('header')?>
	<body>
		<div class="cr">
			<?php echo $this->fetch('content'); ?>
		</div>
		<?=$this->element('footer')?>
		<script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  		<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="/js/slick.min.js"></script>
		<script type="text/javascript" src="/js/script.js"></script>
	</body>
</html>