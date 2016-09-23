<h1>Список пользователей</h1>
<a href="/admin/users/add">Добавить нового пользователя</a>
<?php //debug($data)?>
 <?php if(!empty($data)): ?>
<table>
	<tr>
		<th>ID</th>
		<th>Название</th>
		<th>Дествия</th>	
	</tr>
 	<?php foreach($data as $item): ?>
 	<tr>
 		<td><?=$item['User']['id']?></td>
 		<td><?=$item['User']['username']?></td>
 		<td><a href="/admin/users/edit/<?=$item['User']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['User']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>