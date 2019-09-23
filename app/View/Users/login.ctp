<?php echo $this->Html->css('signin'); ?>

<?php
echo $this->Form->create();
echo $this->Html->image('logo.jpg', ['class' => 'mb-4', 'alt' => 'SampleMed']);

?>
<div class='form-group'>
    <label>Usuario</label>
    <?php echo $this->Form->input('username', ['class' => 'form-control', 'placeholder' => 'Digite o usuário', 'label' => false]) ?>
</div>

<div class='form-group'>
    <label>Senha</label>
    <?php echo $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Digite a senha', 'label' => false]) ?>
</div>

<?php
echo $this->Form->button('Logar', ['class' => 'btn btn-md btn-primary btn-block']); ?>
<?php
echo $this->Form->end;

?>