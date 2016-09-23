<div class="content">
    <div class="news">
        <div class="news-second__img">
            <img src="/img/news/<?php echo $data['News']['img']; ?>" alt="">
        </div>
        <div class="news-title">
            <?php echo $data['News']['title']; ?>
        </div> 
        <div class="news-date">
            Дата публикации: <?php echo $this->Time->format($data['News']['date'], '%d.%m.%Y', 'invalid'); ?>
        </div>
        <?php echo $data['News']['body']; ?>
    </div>
    <div class="hypercomment"></div>
    <div class="other-news">
        <div class="other-news__title title">Остальные новости и статьи</div>     
        <?php foreach($other_news as $item): ?>
        <div class="other-news__item news-item">
            <div class="date">
                <div class="date_big"><?php echo $this->Time->format($item['News']['date'], '%d', 'invalid'); ?></div>
                
                <span><?php echo $this->Time->format($item['News']['date'], '%m', 'invalid'); ?></span>
                <span><?php echo $this->Time->format($item['News']['date'], '%Y', 'invalid'); ?></span>
            </div>
            <div class="news-item__img">
                <img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="<?=$item['News']['title']?>">
            </div>
            <a href="/news/<?=$item['News']['alias']?>" class="news-item__title"><?=$item['News']['title']?>
            </a>
        </div>
        <?php endforeach ?>
    </div>
 </div>