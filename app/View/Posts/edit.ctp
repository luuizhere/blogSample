<div class="list-group-item posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<div class="d-flex">
                 <h2 class="display-4 titulo">Editar Post</h2>
				 <hr>
        </div> 
	<?php
		echo $this->Form->input('id',['class'=>'form-control']);
		echo $this->Form->input('title',['class'=>'form-control']);
		echo $this->Form->input('body',['class'=>'form-control']);
		echo $this->Form->input('categorias_id',['class'=>'form-control']);
		echo $this->Form->input('status',['class'=>'form-control']);
		echo $this->Form->hidden('users_id',['value'=>$current_user['id']]);
	?>
	</fieldset>
	<br>
<?php echo $this->Form->button('Editar',['class'=>'btn btn-md btn-primary']); ?>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
