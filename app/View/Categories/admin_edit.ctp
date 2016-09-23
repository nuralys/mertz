<div class="title admin_t">
		<h2>Редактирование</h2>
	</div>
<?php 

// debug($c_list);
echo $this->Form->create('Category', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название', 'class' => ''));
echo $this->Form->input('alias', array('label' => 'alias:'));
echo $this->Form->end('Редактировать');
?>