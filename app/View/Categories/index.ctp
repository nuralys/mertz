<div class="product-index">
  <div class="product-index__title">
    НАША ПРОДУКЦИЯ
    <span>Каталог наших товаров</span>
  </div>
  <ul class="product-menu">
    <li class="product-menu_item active">
      <span class="product-menu_item__link">НОЖНИЦЫ</span>
    </li>
    <li class="product-menu_item">
      <span class="product-menu_item__link">ПЕДИКЮРНЫЕ ИНСТРУМЕНТЫ</span>
    </li>
    <li class="product-menu_item">
      <span class="product-menu_item__link">КОСМЕТОЛОГИЧЕСКИЕ ИНСТРУМЕНТЫ</span>
    </li>
    <li class="product-menu_item">
      <span class="product-menu_item__link">ПАРИКМАХЕРСКИЕ НОЖНИЦЫ</span>
    </li>
    <li class="product-menu_item">
      <span class="product-menu_item__link">МАНИКЮРНЫЕ НАБОРЫ</span>
    </li>
    <li class="product-menu_item">
      <span class="product-menu_item__link">ЛИНИЯ MRZ</span>
    </li>
  </ul>
  <div class="product-content">
  <?php //debug($products) ?>
  <?php for($i=1;$i<=6;$i++): ?>
    <div class="product-content_item <?php if($i==1) echo 'active'; ?>">
      <div class="product-content_item-title title">НОЖНИЦЫ</div>
      
      <ul class="product-list">
        <div class="product-list-side-bar product-list__item">
          <div class="product-item">
            <a href="" class="product-list-side-bar_link active">Ножницы</a>
            <a href="" class="product-list-side-bar_link">Ножницы с ручной заточкой</a>
            <a href="" class="product-list-side-bar_link">Кусачки для кожи</a>
            <a href="" class="product-list-side-bar_link">Кусачки для ногтей</a>
            <a href="" class="product-list-side-bar_link">Кусачки с ручной заточкой</a>
            <a href="" class="product-list-side-bar_link">Профессиональные инструменты</a>
            <a href="" class="product-list-side-bar_link">Отдельные инструменты</a>
            <a href="" class="product-list-side-bar_link">Книпсеры</a>
            <a href="" class="product-list-side-bar_link">Пилки полировочные</a>
            <a href="" class="product-list-side-bar_link">Бруски полировочные</a>
            <a href="" class="product-list-side-bar_link">Пилки металлические</a>
            <a href="" class="product-list-side-bar_link">Пилки мет. с пластиковой ручкой</a>
            <a href="" class="product-list-side-bar_link">Пилки лазерные</a>
            <a href="" class="product-list-side-bar_link">Пилки керамические</a>
            <a href="" class="product-list-side-bar_link">Пилки стеклянные</a>
            <a href="" class="product-list-side-bar_link">Ножи для кутикулы</a>
          </div>
        </div>
        <?php foreach($products[$i] as $item): ?>
                <?php if($item['Product']): ?>
                    <?php foreach($item['Product'] as $k): ?>
        <li class="product-list__item" >
          <div class="product-item-navs">
          <?php foreach($item['Product'] as $j): ?>
            <?php if($k['id'] == $j['parent_id']): ?>
            <div class="product-item-nav active">
              <img src="/img/product/thumbs/<?=$k['img']?>" alt="">
            </div>
            <?php break; ?>
                <?php endif ?>
           <?php endforeach ?>

          <?php foreach($item['Product'] as $j): ?>
            <?php if($k['id'] == $j['parent_id']): ?>
            <div class="product-item-nav">
              <img src="/img/product.png" alt="">
            </div>
                <?php endif ?>
           <?php endforeach ?>
          </div>
          
          <div class="product-item active">
            <a href="#modal1"  class="open_modal product-item_img">
              <img src="img/product.png" alt=""/>
              <div class="product-hover--effect">
                
                <p>УЗНАТЬ ПОДРОБНЕЕ</p>
                
              </div>
            </a>
            
            <div class="product-item_name">
              <?=$k['title']?>
            </div>
            <p><span>Размер:</span> <?=$k['size']?></p>
            <p><span>Лезвие:</span> выгнутые</p>
            <p><span>Покрытие:</span> темный никель лезвия и ручки</p>  
          </div>
          <?php foreach($item['Product'] as $j): ?>
            <?php if($k['id'] == $j['parent_id']): ?>
           <div class="product-item">
            <a href="#modal1"  class="open_modal product-item_img">
              <img src="img/product.png" alt=""/>
              <div class="product-hover--effect">
                
                <p>УЗНАТЬ ПОДРОБНЕЕ</p>
                
              </div>
            </a>
            
            <div class="product-item_name">
              <?=$j['title']?>
            </div>
            <p><span>Размер:</span> <?=$j['size']?></p>
            <p><span>Лезвие:</span> выгнутые</p>
            <p><span>Покрытие:</span> темный никель лезвия и ручки</p>  
          </div> 
          <?php endif ?> 
          <?php endforeach ?>
            
        </li>
        
        
        <?php endforeach ?>
                <?php endif ?>
            <?php endforeach ?>
      </ul>
    </div>
<?php endfor ?>
    
  </div>
</div><!-- product-index -->