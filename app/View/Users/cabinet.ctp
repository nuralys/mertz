<div class="big-slogan">
    <h1><?=$data['User']['h1']?></h1>
</div>
<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная</a></li>
    <li class="breadcrumbs-item">Кабинет</li>
</ul>
<aside class="side-bar">
    <ul class="cabinet-list">
        <li class="cabinet-list__item active">
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
          Общая информация
       </div>
        <?php 
        echo $this->Form->create('User', array('type' => 'file'));?>
        <div class="general-information-input_container ">
            <?php
            echo $this->Form->input('img', array('label'=>'Изображение', 'class' =>'inputs','type' => 'file'));
            echo $this->Form->input('title', array('label'=>'','placeholder' => 'Название', 'class' =>'inputs general-information-input input'));
            echo $this->Form->input('phone', array('label' => '', 'class' => 'inputs'));
            echo $this->Form->input('about', array('label' => '', 'class' => 'general-information-textarea feedback-textarea'));
            echo $this->Form->input('conditions', array('label' => '', 'class' => 'general-information-textarea feedback-textarea'));
            echo $this->Form->input('instagram', array('label' => '', 'class' => 'inputs'));
            echo $this->Form->input('vk', array('label' => '', 'class' => 'inputs'));
            echo $this->Form->end('Редактировать',array('class' => 'button'));
            ?>
        </div>
     </div>
</div>
