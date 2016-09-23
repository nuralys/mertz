<div class="big-slogan">
   Свадебные платья напрокат в Астане - prokatastana
</div>
<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная   </a>  </li>
    <li class="breadcrumbs-item"> Свадебные платья напрокат в Астане - prokatastana</li>
</ul>
<aside class="side-bar">
    <div class="magazine">
        <div class="magazine-img">
            <img src="/img/user/thumbs/<?=$data['User']['img']?>" alt="<?=$data['User']['title']?>">
        </div>   
        <a href="tel:<?=$data['User']['phone']?>" class="magazine-item magazine-item__phone">
            <?=$data['User']['phone']?>
        </a>   
        <div class="magazine-item magazine-item__address">
           <?=$data['User']['address']?>
        </div>
        <a href="" class="magazine-item magazine-item__maps">
            <?=$data['User']['map']?>
        </a>
    </div>
</aside>
<div class="content-product">
    <div class="product-slider">
        <div class="product-slider-name-container">
             <div class="product-description__podelitsia-soc-seti">
                  Мы в социальных сетях:
              </div>  
        </div>
        <div class="product-slider-content">
            <div class="product-slider-content__item active">
                <div class="slider-product" >
                    <div class="slider__item">
                        <div class="slider_item_img">
                            <img src="/img/product/thumbs/<?=$data['Product']['img']?>" alt="<?=$data['Product']['title']?>">
                        </div>
                        <div class="product-description">
                              <div class="product-description__name">
                                  <?=$data['Product']['title']?>
                              </div>
                              <?=$data['Product']['body']?>
                              
                              <div class="product-description__item product-price">
                                  Цена: <span><?=$data['Product']['price_day']?> KZT (сутки)</span> 
                              </div>
                              <?php if(!empty($data['Product']['price_lot_of_days'])): ?>
                              <div class="product-description__item product-price">
                                  Цена: <span><?=$data['Product']['price_lot_of_days']?> KZT (от 3 суток)</span> 
                              </div>
                          	<?php endif ?>
                              <div class="product-description__item product-size">
                                 Размеры:  <?=$data['Product']['size']?>
                              </div>
                              <div class="product-description__item product-bron">
                                 Бронь:  <?=$data['Product']['book']?> KZT
                              </div>
                              <div class="product-description__podelitsia">
                                  Расскажите о нас друзьям
                              </div>
                          </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="hypercomment"></div>
    <div class="o-nas">
        <div class="service-index_title">О компании</div>
        <p><?= $this->Text->truncate(strip_tags($data['User']['about']), 1000, array('ellipsis' => '...', 'exact' => true)) ?></p>
    </div>
    <div class="uslovia-prokata">
        <div class="uslovia-prokata__title title">
            Условия проката
        </div>
        <p><?= $this->Text->truncate(strip_tags($data['User']['conditions']), 1000, array('ellipsis' => '...', 'exact' => true)) ?></p>
    </div>
    
</div>
