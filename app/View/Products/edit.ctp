<div class="big-slogan">
    <h1><?=$data['User']['h1']?></h1>
</div>
<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная</a></li>
    <li class="breadcrumbs-item"><?=$data['User']['title']?></li>
</ul>
<aside class="side-bar">
    <ul class="cabinet-list">
        <li class="cabinet-list__item ">
            <a href="/users/cabinet" class="cabinet-list__item--link ">
                Общая информация
            </a>
        </li>
        <li class="cabinet-list__item">
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

<div class="content-cabinet content-product ">
    <div class="general-information">
        <div class="general-information__title">
          Редактировать
       </div>
        <?php 
      echo $this->Form->create('Product', array('type' => 'file'));?>
        <div class="general-information-input_container ">
            <?php
            echo $this->Form->input('title', array('label' => 'Название:', 'class' =>'inputs'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file', 'class' =>'inputs'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor', 'class' => 'general-information-textarea feedback-textarea'));
echo $this->Form->input('price_day', array('label' => 'Цена (за сутки):', 'class' =>'inputs'));
echo $this->Form->input('price_lot_of_days', array('label' => 'Цена (от 5 суток):', 'class' =>'inputs'));
echo $this->Form->input('book', array('label' => 'Бронь:', 'class' =>'inputs'));
echo $this->Form->input('size', array('label' => 'Размеры:', 'class' =>'inputs'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:', 'class' =>'inputs'));
echo $this->Form->input('description', array('label' => 'Описание:', 'class' => 'general-information-textarea feedback-textarea'));
echo $this->Form->end('Редактировать');
            ?>
        </div>
     </div>
</div>
