<div class="list-group-item comments form">
	<?php echo $this->Form->create('Comment'); ?>
		<fieldset>
			<div class="d-flex">
					<h2 class="display-4 titulo">Adicionar comentario ao Post</h2>
					<hr>
			</div> 
		
			<label for="Comentario">Comentario</label>
			<?php
			echo $this->Form->input('commentary',['class'=>'form-control','label'=>false,'placeholder'=>'Escreva seu comentario']);
			echo $this->Form->hidden('posts_id',['value'=>$id]);
		?>
		</fieldset>
		<br>
		<?php echo $this->Form->button('Adicionar comentario',['class'=>'btn btn-primary btn-md']); ?>
	<?php echo $this->Form->end(); ?>
	</div>
	
</div>
