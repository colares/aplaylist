<?php 

/**
 * PAPER
 */
Router::connect(
	'/admin/events',
	array('plugin' => 'event', 'controller' => 'events', 'action' => 'index', 'prefix' => 'admin')
);
Router::connect(
	'/admin/events/:action/*',
	array('plugin' => 'event', 'controller' => 'events', 'prefix' => 'admin')
);

Router::connect(
	'/profile/events',
	array('plugin' => 'event', 'controller' => 'events', 'action' => 'index', 'prefix' => 'profile')
);
Router::connect(
	'/profile/events/:action/*',
	array('plugin' => 'event', 'controller' => 'events', 'prefix' => 'profile')
);

Router::connect(
	'/profile/data_warehouses/:action/*',
	array('plugin' => 'event', 'controller' => 'data_warehouses', 'prefix' => 'profile')
);

 ?>