<?php //debug($data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование материала</h2>
	</div>
<?php 

echo $this->Form->create('Product', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>
<div id="cropContainerEyecandy"></div>
 <link href="/css/main.css" rel="stylesheet">
    <link href="/css/croppic.css" rel="stylesheet">
   	<script src="/js/croppic.min.js"></script>
    <script>
		var croppicContainerEyecandyOptions = {
				uploadUrl:'/ajax/img_save_to_file.php',
				cropUrl:'/ajax/img_crop_to_file.php',
				imgEyecandy:false,				
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(data){ console.info(data);},
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(data){ console.info(data.url); console.info(data.urlsource);				
				$('.imgcrop').val(data.url);
				$('.imgsource').val(data.urlsource);
				},
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);

	</script>
<input type="text" name="data[Product][imgsource]" class="imgsource" value="" />
<input type="text" name="data[Product][imgcrop]" class="imgcrop" value="" />
</div>
<?php
echo $this->Form->input('mini_img', array('label' => 'мини изображение:', 'type' => 'file'));
echo $this->Form->input('size', array('label' => 'Размеры:'));
echo $this->Form->input('blade', array('label' => 'Лезвие:'));
echo $this->Form->input('coating', array('label' => 'Покрытие:'));
echo $this->Form->input('characteristics', array('label' => 'Характеристики:'));
echo $this->Form->input('material', array('label' => 'Материал:'));
echo $this->Form->input('hardness', array('label' => 'Твердость:'));
?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>

</div>