<div class="list-group-item categorias form">
	<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><?php echo __('Add Categoria'); ?></legend>
		<?php
		echo $this->Form->input('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nome da categoria']);
		?>
	</fieldset>
	<br>
	<?php echo $this->Form->button('Criar Categoria', ['class' => 'btn btn-md btn-primary']); ?>
	<?php echo $this->Form->end(); ?>
</div>