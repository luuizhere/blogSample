<?php echo $this->Form->create(); ?>

    <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>

    <?php echo $this->Form->input('password',array('type'=>'text','label'=>array('text'=>'Enter your new password'))); ?>


    <?php echo $this->Form->hidden('groups_id',array(
			'value' => $current_user['groups_id'],
		)); ?>
    <?php echo $this->Form->hidden('password_ini',array(
		'value' => 'ALTERED',
	)); ?>
    <button type="submit">Save</button>

<?php echo $this->Form->end(); ?>