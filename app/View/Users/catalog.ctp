 <div class="big-slogan">
   <?=$data['h1']?>
</div>
<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная</a></li>
    <li class="breadcrumbs-item"><a href="/users/cabinet" class="breadcrumbs-item__link">Кабинет</a></li>
    <li class="breadcrumbs-item">Каталог</li>
</ul>
<aside class="side-bar">
    <ul class="cabinet-list">
        <li class="cabinet-list__item">
            <a href="/users/cabinet" class="cabinet-list__item--link ">
                Общая информация
            </a>
        </li>
        <li class="cabinet-list__item active">
            <a href="/users/catalog" class="cabinet-list__item--link">
                Каталог
            </a>
        </li>
        <li class="cabinet-list__item">
            <a href="/users/accessory" class="cabinet-list__item--link">
                Аксессуары
            </a>
        </li>
    </ul>
</aside>

 <?php if(!empty($products)): ?>
 	<div class="edit-product">
 		<a href="" class="button add">Добавить товар</a>
 		<div class="edit-product_head">
			<p>Картинка  </p>
			<p> Название товара	</p>
			<p>Редактирование</p>
			<p>Удаление</p>
 		</div>
		<ul class="edit-product_body">
			
			<?php foreach($products as $item): ?>
				<li class="edit-product_item">
					<div class="edit-product_item-container">	
						<div class="product-item product_img">
							<img src="/img/product/thumbs/<?=$item['Product']['img']?>">
						</div>
						<div class="product-item product_name">
							<?=$item['Product']['title']?>
						</div>
						<div class="product-item edit">
							<a href="/products/edit/<?=$item['Product']['id']?>" class="button edit">Редактировать</a>
						</div>
						<div class="product-item delete">
							<?php echo $this->Form->postLink('Удалить', array('controller'=>'products','action' => 'delete', $item['Product']['id']), array('confirm' => 'Подтвердите удаление')); ?>
						</div>
					</div>
				</li>
			<?php endforeach ?>
		</ul>
 	</div>


<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>
