
<div class='list-group-item'>
	<div class="posts index">
		<div class='titulo'text-center>
			<h3><?php echo " Postagens"; ?></h3>
		</div>
		<?php if(($current_user['groups_id'] == 2)or$current_user['groups_id'] == 1): // Se o Usuario tiver permissão de ADM(1) ou GESTOR(2)?>
			<div class='acoes-titulo'>
				<?php echo $this->Html->link($this->Form->button('Criar Postagem',['class'=>'btn btn-verde btn-sm']), array(
				'controller' => 'posts', 
				'action' => 'add'
				), array('escape' => false));?>
			</div>
		<?php endif; ?>		
	<?php foreach ($posts as $post): ?>
		<div class='minhaClasse'>	
			<div class="card text-center" align="center">
			
				<div class="card-header">
					<?php if(($current_user['groups_id'] == 2)or$current_user['groups_id'] == 1): ?>
						<?php echo "<br>".	$this->Html->link(
						$this->Html->image('delete.png',array('height' => '18', 'width' => '18')),
						array(
							'controller' => 'posts', 
							'action' => 'remove',
							$post['Post']['id']
						), array('escape' => false)) ." _ ". $this->Html->link(
						$this->Html->image('edit.png',array('height' => '18', 'width' => '18')),
						array(
							'controller' => 'posts', 
							'action' => 'edit',
							$post['Post']['id']
						), array('escape' => false));   ?>
					<?php endif; ?>	
					<?php if($current_user['groups_id'] == 3): /// Se for usuario, liberado para comentar ?>
						<?php echo "<br>".	$this->Html->link(
							$this->Form->button('Criar comentario'),
							array(
								'controller' => 'comments', 
								'action' => 'add',
								$post['Post']['id']
							), array('escape' => false)); ?>
					<?php endif; ?>			
				</div>
			

				<div class="card-body">
					<h3 class="card-title"> <?php  echo "<strong>".$post['Post']['title']. "</strong> <hr>";?> </h3>
					
					<p class="card-text"> <?php echo $post['Post']['body']; ?></p>
					
					<?php echo $this->Html->link('Ver mais',array('action' => 'view', $post['Post']['id']),array('class'=>'btn btn-sm btn-primary')); ?>
				</div>		  
				<hr>
				<div class="card-footer text-muted">
					<?php echo $this->Time->format('F jS, Y h:i A',$post['Post']['created']) . " Por " . $this->Html->link($post['Users']['name'], array('controller' => 'users', 'action' => 'view', $post['Users']['id'])); ?>
				</div>
			</div>
	</div>	
	<hr>
		<?php endforeach; ?>

		
	<div class="paginas">
	</p>
		<nav aria-label="Page navigation">
			<ul class="pagination">
				<li>
					<?php echo $this->Paginator->prev(' ' . __('<<'), array(), null, array('class' => 'prev disabled')); ?>
				</li>
				<li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>

				<li>
					<span aria-hidden="true"><?php 	echo $this->Paginator->next(__('>>') . ' ', array(), null, array('class' => 'next disabled')); ?></span>
				</li>
			</ul>
		</nav>
	</div>	
	</div>

</div>

