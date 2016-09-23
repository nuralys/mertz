<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная</a></li>
    <li class="breadcrumbs-item">Новости</li>
</ul>
 <ul class="news-list">
 <?php foreach($data as $item): ?>
     <li class="news-list__item news-item">
        <div class="news-item_container">
             <div class="news-list__item-date date ">
                <div class="date_big"><?php echo $this->Time->format($item['News']['date'], '%d', 'invalid'); ?></div>
                
                <span><?php echo $this->Time->format($item['News']['date'], '%m', 'invalid'); ?></span>
                <span><?php echo $this->Time->format($item['News']['date'], '%Y', 'invalid'); ?></span>
            </div>
            <div class="news-item__img">
                <img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="<?php echo $item['News']['title']; ?>">
            </div>
            <a href="/news/<?=$item['News']['alias']?>" class="news-item__title news-list__item-title">
                <?php echo $item['News']['title']; ?>
            </a>
        </div> 
     </li>
     <?php endforeach ?>
 </ul>