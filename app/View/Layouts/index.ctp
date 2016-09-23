<html>
<head>
<title><?=$title_for_layout?></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta name="keyword" content="">
<meta name="description" content="">
<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
<link href="/css/normalize.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/css/slide.min.css">
<link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css" media="screen" />
</head>
<body>
    <div class="page">
        <?=$this->element('header') ?>
        <div class="container">
            <div class="cr">
                <?php echo $this->Session->flash('good'); ?>
                <?php echo $this->Session->flash('bad'); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
    <div class="cr">
    <?=$this->element('footer') ?>
</div>
<div id="modal1" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
    <span class="modal_close"></span>
        <div class="modal-product">
            
        </div>
    </div>
    <div id="overlay"></div>
    <script src="/js/jquery.3.js" type="text/javascript"></script>
    <script src="/js/app.js" type="text/javascript"></script>
</body>
</html>