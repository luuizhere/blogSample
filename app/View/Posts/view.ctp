<div class="list-group-item  posts view">
		<div class="d-flex">
                 <h2 class="display-4 titulo">	<?php echo h($post['Post']['title']); ?></h2>
				 <hr>
        </div> 
		

			<dl>
				<dd>
					<h6><strong>Categoria: </strong><?php echo $post['Categorias']['name']; ?> </h6>
					<?php echo h($post['Post']['body']); ?>
					<hr>
				</dd>
				<div class="form-row">
					<div class="form-group col-md-6">
						<dt><h6> <strong> Data de criação:</strong><?php echo h($this->Time->format('F jS, Y h:i A',$post['Post']['created'])); ?></h6></dt>

					</div>
					<div class="form-group col-md-6">
						<dt><h6> <strong> Usuario criador:</strong><?php echo $this->Html->link($post['Users']['name'], array('controller' => 'users', 'action' => 'view', $post['Users']['id'])); ?></h6></dt>
						<dd>
							<h6></h6>
							&nbsp;
						</dd>
					</div>
						<br>
					
				</div>	
			</dl>
		</div>
		<div>
	
</div>

<div class='list-group-item'>
	<?php if($current_user['groups_id'] == 3):  ?>
		<?php echo $this->Html->link(
							$this->Form->button('Criar comentario'),
							array(
								'controller' => 'posts', 
								'action' => 'remove',
								$post['Post']['id']
							), array('escape' => false)); ?>
	<?php endif;?>
	<table class='table'>
					<thead>
						<tr>
							<th><h5> <strong>Comentarios</strong></h5></th>
							<th><h5> <strong></strong></h5></th>
							<th><h5> <strong></strong></h5></th>
						</tr>
						
					</thead>
					<tbody> <?php
					foreach($comentario as $coment){ ?>
						<tr>
							<td> 
								<?php
								echo h($coment['comments']['commentary']);
								?>
							</td>

							<td>
								<small>
									<?php echo h($this->Time->format('F jS, Y h:i A',$coment['comments']['created']));
								?>
								</small>
							</td>
						</tr>
					<?php } ?> 
					</tbody>
	</table>
</div>
