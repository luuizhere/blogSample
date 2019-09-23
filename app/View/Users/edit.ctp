<div class="list-group-item users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<div class="d-flex">
			<h2 class="display-4 titulo">Editar Usuário</h2>
		</div>
		<hr>
		<div> <?php echo $this->Form->input('id', ['class' => 'form-group']); ?>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label><span class="text-danger">*</span> Nome</label>
					<?php echo $this->Form->input('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Seu nome']); ?>
				</div>
				<div class="form-group col-md-6">
					<label><span class="text-danger">*</span> E-mail</label>
					<?php echo $this->Form->input('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Seu melhor email']); ?>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label><span class="text-danger">*</span> Usuario</label>
					<?php echo $this->Form->input('username', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Seu nome']); ?>
				</div>
				<div class="form-group col-md-6">
					<label><span class="text-danger">*</span> Status</label>
					<?php echo $this->Form->input('status', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Seu melhor email']); ?>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label><span class="text-danger">*</span> Grupo</label>
					<?php echo $this->Form->input('groups_id', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Seu nome']); ?>
				</div>
				<div class="form-group col-md-6">

					<?php echo $this->Form->hidden('password_ini', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Seu nome']); ?>
				</div>
			</div>
		</div>
	</fieldset>
	<?php
	echo $this->Form->button('Editar', ['class' => 'btn btn-primary']);
	echo $this->Form->end(); ?>
</div>