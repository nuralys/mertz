<div class="title admin_t">
		<h2>Добавление материала</h2>
	</div>
<?php 

echo $this->Form->create('Product', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
?>
<div class="input select">
<label for="ProductCategoryId">Категории:</label>
	<select required name="data[Product][category_id]" id="ProductCategoryId">
		<option value="">Выберите категорию</option>
		<?php foreach($categories as $key => $value): ?>
			<option value="<?=$key?>"><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
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
<input type="text" required="required" name="data[Product][imgsource]" class="imgsource" value="" />
<input type="text" required="required" name="data[Product][imgcrop]" class="imgcrop" value="" />
<?php
echo $this->Form->input('mini_img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('size', array('label' => 'Размеры:'));
echo $this->Form->input('blade', array('label' => 'Лезвие:'));
echo $this->Form->input('coating', array('label' => 'Покрытие:'));
echo $this->Form->input('characteristics', array('label' => 'Характеристики:'));
echo $this->Form->input('material', array('label' => 'Материал:'));
echo $this->Form->input('hardness', array('label' => 'Твердость:'));
echo $this->Form->end('Создать');
?>
</div>