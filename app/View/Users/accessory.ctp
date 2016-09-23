 <div class="big-slogan">
    <h1><?=$data['h1']?></h1>
</div>
<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная</a></li>
    <li class="breadcrumbs-item"><a href="/users/cabinet" class="breadcrumbs-item__link">Кабинет</a></li>
    <li class="breadcrumbs-item">Аксессуары</li>
</ul>
<aside class="side-bar">
    <ul class="cabinet-list">
        <li class="cabinet-list__item">
            <a href="/users/cabinet" class="cabinet-list__item--link ">
                Общая информация
            </a>
        </li>
        <li class="cabinet-list__item">
            <a href="/users/catalog" class="cabinet-list__item--link">
                Каталог
            </a>
        </li>
        <li class="cabinet-list__item active">
            <a href="/users/accessory" class="cabinet-list__item--link">
                Аксессуары
            </a>
        </li>
    </ul>
</aside>

 <?php if(!empty($accessory)): ?>



 	<div class="edit-product">
 		<a href="/accessories/add" class="button add">Добавить товар</a>
 		<div class="edit-product_head">
			<p>Картинка  </p>
			<p> Название товара	</p>
			<p>Редактирование</p>
			<p>Удаление</p>
 		</div>
		<ul class="edit-product_body">
			
			<?php foreach($accessory as $item): ?>
				<li class="edit-product_item">
					<div class="edit-product_item-container">	
						<div class="product-item product_img">
							<img src="/img/accessory/thumbs/<?=$item['Accessory']['img']?>">
						</div>
						<div class="product-item product_name">
							<?=$item['Accessory']['title']?>
						</div>
						<div class="product-item edit">
							<a href="/accessories/edit/<?=$item['Accessory']['id']?>" class="button edit">Редактировать</a>
						</div>
						<div class="product-item delete">
							<?php echo $this->Form->postLink('Удалить', array('controller'=>'accessories','action' => 'admin_delete', $item['Accessory']['id']), array('confirm' => 'Подтвердите удаление')); ?>
						</div>
					</div>
				</li>
			<?php endforeach ?>
		</ul>
 	</div>


<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>