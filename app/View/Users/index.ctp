<div class="list-group-item users index">
	<div class="d-flex">
		<div class="mr-auto p-2">
			<h2 class="display-4 titulo">Listar Usuário</h2>
		</div>

	</div>
	<table cellpadding="0" cellspacing="0" class='table  table-striped'>
		<thead class='thead-dark'>
			<tr>
				<th><?php echo $this->Paginator->sort('Nome'); ?></th>
				<th><?php echo $this->Paginator->sort('Email'); ?></th>
				<th><?php echo $this->Paginator->sort('Grupos'); ?></th>
				<?php if ($current_user['groups_id'] == 1) : ?>
					<th class="actions"><?php echo __('Actions'); ?></th>
				<?php endif;	?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) : ?>
				<tr>
					<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($user['Groups']['name'], array('controller' => 'groups', 'action' => 'view', $user['Groups']['id'])); ?>
					</td>
					<?php if ($current_user['groups_id'] == 1) : ?>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div class="paginas">
		<nav aria-label="Page navigation">
			<ul class="pagination">
				<li>
					<?php echo $this->Paginator->prev(' ' . __('<<'), array(), null, array('class' => 'prev disabled')); ?>
				</li>
				<li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>

				<li>
					<span aria-hidden="true"><?php echo $this->Paginator->next(__('>>') . ' ', array(), null, array('class' => 'next disabled')); ?></span>
				</li>
			</ul>
		</nav>
	</div>
</div>
<?php if ($current_user['groups_id'] == 1) : ?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Groups'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php endif; ?>