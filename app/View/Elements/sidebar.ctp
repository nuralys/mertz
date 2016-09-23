<aside class="aside">
    <div class="aside-head">
        Каталог продукции
    </div>
    <ul class="aside-list">
    <?php foreach($sidebar as $item): ?>
        <li class="aside-list__item">
            <div class="aside-list__item___head"><?=$item['Category']['title']?></div>
            <?php if(!empty($item['Product'])): ?>
            <div class="aside-list__item___container"> 
            <?php //debug($item['Product']);die; ?>
            <?php foreach($item['Product'] as $k): ?>
                <a href="/product/<?=$k['id']?>" class="aside-list__item___link"><?=$k['title'] ?></a>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        </li>
    <?php endforeach ?>
    </ul>
</aside>
