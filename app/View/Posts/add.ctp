<div class="list-group-item  posts form">
	<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<div class="d-flex">
			<h2 class="display-4 titulo">Novo Post</h2>
			<hr>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label><span class="text-danger">*</span> Titulo</label>
				<?php echo $this->Form->input('title', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Titulo do post']); ?>
			</div>
			<div class="form-group col-md-6">
				<label><span class="text-danger">*</span> Categorias</label>
				<?php echo $this->Form->input('categorias_id', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Titulo do post']); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label><span class="text-danger">*</span> Corpo do post</label>
				<?php echo $this->Form->input('body', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Titulo do post']); ?>
			</div>


		</div>
		<?php echo $this->Form->hidden('users_id', ['value' => $current_user['id']]); ?>
	</fieldset>

	<?php echo $this->Form->button('Criar', ['class' => 'btn btn-primary']); ?>
	<?php echo $this->Form->end(); ?>

</div>