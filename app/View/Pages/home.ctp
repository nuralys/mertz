<div class="akci-index">
    <div class="discounts-card">
        СКИДКА <span class="discount"> 50%  </span> <span class="discount-name">НОВЫЕ НОЖНИЦЫ 634Z</span>
    </div>
    <div class="discounts-product discounts-product-big">
        <img src="img/product_big.png" class="discounts-product-big_img" alt="">
        <div class="discounts-product-big_text">
            НОВИНКА
            <span>MERTZ833</span>
            <a href="" class="button">УЗНАТЬ ПОДРОБНЕЕ</a>
        </div>  
    </div>
    <div class="discounts-product-item">
        <img src="img/product-index1.png" alt="">
        <a href="" class="white-button button">УЗНАТЬ ПОДРОБНЕЕ</a>
    </div>
    <div class="discounts-card discounts-card_small">
        СКИДКА ПРИ ЗАКАЗЕ
        <span class="discount-smal">15%</span>
    </div>
    <div class="discounts-product-item discounts-product-item_right">
        <img src="img/product-index2.png" alt="">
        <a href="" class="white-button button">УЗНАТЬ ПОДРОБНЕЕ</a>
    </div>
    <div class="discounts-product-long">
        <div class="discounts-product-long_text">
            НОВИНКА
            <span>MERTZ833</span>
        </div>
        <img src="img/product-index3.png" alt="">
    </div>
</div>
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
    <?php for($i=1;$i<=6;$i++): ?>
        <div class="product-content_item <?php if($i==1) echo 'active'; ?>">
            <ul class="product-list">
            <?php foreach($products[$i] as $item): ?>
                <?php if($item['Product']): ?>
                    <?php foreach($item['Product'] as $k): ?>
                        <li class="product-list__item" id="product-list__item">
                            <div class="product-item">
                                <a href="# 222"  class="product-item_img">
                                    <img src="img/product.png" alt=""/>
                                    <div class="product-hover--effect">
                                        <div class="product-hover--effect_name">
                                            <?=$k['title']?>
                                        </div>
                                        <p>УЗНАТЬ ПОДРОБНЕЕ</p>  
                                    </div>
                                </a>
                                <div class="product-item_name"><?=$k['title']?></div>
                                <p><span>Размер:</span> длина 9 см</p>
                                <p><span>Лезвие:</span> выгнутые</p>
                                <p><span>Покрытие:</span> темный никель лезвия и ручки</p>  
                            </div>  
                        </li>
                    <?php endforeach ?>
                <?php endif ?>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endfor ?>
    </div>
</div>
<div class="news-title product-index__title">
    НОВОСТИ
</div>
<ul class="news">
<?php foreach($news as $item): ?>
    <li class="news-item">
        <div class="news-item_container">
            <div class="news-img">
                <img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="<?=$item['News']['title']?>">
            </div>
            <div class="date">
               <?php echo $this->Time->format($item['News']['date'], '%d/%m/%Y', 'invalid'); ?>
            </div>
            <a href="" class="news-title">
                <?=$item['News']['title']?>
            </a>
            <a href="/news/<?=$item['News']['id']?>" class="read-more">
                Узнать подробнее...
            </a>
        </div>
    </li>
    <?php endforeach ?>
</ul>