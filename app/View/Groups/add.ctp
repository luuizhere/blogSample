<div class=" list-group-item groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name',['class'=>'form-control','label'=>false,'placeholder'=>'Escreva o nome do Grupo']);
		echo $this->Form->input('level',['class'=>'form-control','label'=>false,'placeholder'=>'Lembrando que  1 => Usuario,  2 => Gestor , 3 => Adm']);
		echo $this->Form->input('status',['class'=>'form-control','label'=>false,'placeholder'=>'Escreva o nome do Grupo']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
	</ul>
</div>
