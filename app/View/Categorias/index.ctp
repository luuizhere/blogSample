<div class="list-group-item categorias index">
	<div class="d-flex">
		<h2 class="display-4 titulo">Categorias</h2>
		<hr>
	</div>

	<table cellpadding="0" cellspacing="0" class="table">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('#'); ?></th>
				<th><?php echo $this->Paginator->sort('Nome'); ?></th>
				<?php if ($current_user['groups_id'] == 1) :  ?>
					<th class="actions"><?php echo __('Actions'); ?></th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($categorias as $categoria) : ?>
				<tr>
					<td><?php echo h($categoria['Categoria']['id']); ?>&nbsp;</td>
					<td><?php echo h($categoria['Categoria']['name']); ?>&nbsp;</td>
					<?php if ($current_user['groups_id'] == 1) :  ?>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoria['Categoria']['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoria['Categoria']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoria['Categoria']['id']), array(), __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de um total de {:count} total, iniciando no registro {:start}, acando no {:end}')
		));
		?> </p>
	<div class="paging">
		<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<?php if ($current_user['groups_id'] == 1) :  ?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?></li>
		</ul>
	</div>
<?php endif; ?>