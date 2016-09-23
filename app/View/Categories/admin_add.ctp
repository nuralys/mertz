<div class="title admin_t">
		<h2>Добавление категории</h2>
	</div>
<?php 
echo $this->Form->create('Category', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('alias', array('label' => 'Alias', 'placeholder'=>'svadebnye-platjya'));
echo $this->Form->end('Создать');
?>