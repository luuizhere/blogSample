<div class="list-group-item">
  <?php echo $this->Form->create(); ?>

  <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>

  <?php echo $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'label' => array('text' => 'Enter your new password'))); ?>


  <?php echo $this->Form->hidden('groups_id', array(
    'value' => $current_user['groups_id'],
  )); ?>
  <?php echo $this->Form->hidden('password_ini', array(
    'value' => 'ALTERED',
  )); ?>
  <br>
  <?php echo $this->Form->button('Alterar a senha', ['class' => 'btn btn-primary']); ?>

  <?php echo $this->Form->end(); ?>
</div>