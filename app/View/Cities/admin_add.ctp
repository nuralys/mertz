<div class="title admin_t">
	<h2>Добавление нового города</h2>
</div>
<?php 
echo $this->Form->create('City');
echo $this->Form->input('title', array('label' => 'Название', 'placeholder'=>'Астана'));
echo $this->Form->input('alias', array('label' => 'Alias', 'placeholder'=>'astana'));
echo $this->Form->end('Создать');
?>
