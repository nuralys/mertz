<?php //debug($categories[2]) ?>
<div class="product-index">
  <div class="product-index__title">
    НАША ПРОДУКЦИЯ
    <span>Каталог наших товаров</span>
  </div>
  <ul class="product-menu">
  <?php foreach($parent_cats as $item): ?>
    <li class="product-menu_item active">
      <span class="product-menu_item__link"><?=$item['Category']['title'] ?></span>
    </li>
    <?php endforeach ?>
  </ul>
  <div class="product-content">
  <?php //debug($products) ?>
  <?php for($i=1;$i<=6;$i++): ?>
    <div class="product-content_item <?php if($i==1) echo 'active'; ?>">
      <div class="product-content_item-title title">НОЖНИЦЫ</div>
      
      <ul class="product-list">
        <div class="product-list-side-bar product-list__item">
          <div class="product-item">
          <?php //debug($categories[1]) ?>
          <?php //for($n=1;$n<=6;$n++): ?>
          <?php foreach($categories[$i] as $item): ?>
            <?php //debug($item);die; ?>
            <a href="" id="link_<?=$item['Category']['id'] ?>" class="product-list-side-bar_link active">
              <?=$item['Category']['title'] ?>
            </a>
          <?php endforeach ?>
          <?php //endfor ?>
          </div>
        </div>
        <?php foreach($products[$i] as $item): ?>
          
                <?php if($item['Product']): ?>
                    <?php foreach($item['Product'] as $k): ?>
                      <?php if($k['parent_id']==0): ?>
        <li class="product-list__item" id="prod_<?=$item['Category']['id']?>">
          <div class="product-item-navs">
          <?php foreach($item['Product'] as $j): ?>
            <?php if($k['id'] == $j['parent_id']): ?>
            <div class="product-item-nav active">
              <img src="/img/product/thumbs/<?=$k['mini_img']?>" alt="">
            </div>
            <?php break; ?>
                <?php endif ?>
           <?php endforeach ?>

          <?php foreach($item['Product'] as $j): ?>
            <?php if($k['id'] == $j['parent_id']): ?>
            <div class="product-item-nav">
              <img src="/img/product/thumbs/<?=$j['mini_img']?>" alt="">
            </div>
                <?php endif ?>
           <?php endforeach ?>
          </div>
          
          <div class="product-item active">
            <a href="#modal1"  class="open_modal product-item_img">
              <img src="/img/product/thumbs/<?=$k['img']?>" alt=""/>
              <div class="product-hover--effect">
                
                <p>УЗНАТЬ ПОДРОБНЕЕ</p>
                
              </div>
            </a>
            
            <div class="product-item_name">
              <?=$k['title']?>
            </div>
            <p><span>Размер:</span> <?=$k['size']?></p>
            <p><span>Лезвие:</span> <?=$k['blade']?></p>
            <p><span>Покрытие:</span> <?=$k['coating']?></p>  
          </div>
          <?php foreach($item['Product'] as $j): ?>
            <?php if($k['id'] == $j['parent_id']): ?>
           <div class="product-item">
            <a href="#modal1"  class="open_modal product-item_img">
              <img src="/img/product/thumbs/<?=$j['img']?>" alt=""/>
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
        <?php endif ?>
        
        <?php endforeach ?>
                <?php endif ?>
            <?php endforeach ?>
      </ul>
    </div>
<?php endfor ?>
    
  </div>
</div><!-- product-index -->