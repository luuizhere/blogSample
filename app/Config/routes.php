<?php

	Router::connect('/', array('controller' => 'posts', 'action' => 'index'));

	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	CakePlugin::routes();


	require CAKE . 'Config' . DS . 'routes.php';
