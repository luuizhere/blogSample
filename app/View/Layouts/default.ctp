<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div class="container">

<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Blog SampleMed</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><?php echo $this->Html->link('Posts',['controller'=>'posts','action'=>'index']); ?></li>
			  <?php if($current_user['groups_id'] == 1 ) :?>
				  <li><?php echo $this->Html->link('Categorias',['controller'=>'categorias','action'=>'index']); ?></li>
			  <?php endif;?>	  
			  <?php if(!$logged_in): ?>
              	<li><?php echo $this->Html->link('Login',['controller'=>'users','action'=>'login']); ?></li>
			  <?php else:?>
				  <li><?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout')); ?></li>
			  <?php endif; ?>  
			  
			</ul>
			<?php if($logged_in): ?>
				<div class='usuario-logado'>
					Bem vindo, <?php echo $current_user['name'];?>
				</div>
			<?php else:?>
				<div class='usuario-logado'>
				   	<?php echo $this->Html->link('Crie sua conta',['controller'=>'users','action'=>'add']); ?>
				</div>
			<?php endif; ?>	
          </div><!--/.nav-collapse -->

        </div><!--/.container-fluid -->
      </nav>
	<div id="container">
		<div id="header">
	
		</div>
		<div id="content">
			
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>