<h1>Города</h1>
<a href="/admin/cities/add">Добавить новый город</a>
<?php //debug($data)?>
 <?php if(!empty($data)): ?>
<table>
	<tr>
			<th>ID</th>
			<th>Название</th>
			
			<th>Дествия</th>	
		</tr>

 	<?php foreach($data as $key => $item): ?>
 	<tr>
 		<td><?=$key?></td>
 		
 		<td><?=$item?></td>
 		<td><a href="/admin/cities/edit/<?=$key?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $key), array('confirm' => 'Подтвердите удаление')); ?></td>
	</tr>
	<?php endforeach ?>
	
</table>
<?php else: ?>
<p>К сожалению категорий нету...</p>
<?php endif ?>