<?php

	// Router::connectNamed(array('lang'));
	Router::redirect('/index.php', '/', array('status' => 301));

	Router::connect('/admin', array('controller' => 'pages', 'action' => 'index', 'admin' => true));
	
	Router::connect('/news', array('controller' => 'news', 'action' => 'index'));
	
	Router::connect('/:language', 
		array('controller' => 'pages', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);

	Router::connect('/:language/projects/description/*', 
		array('controller' => 'projects', 'action' => 'description'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/projects/location/*', 
		array('controller' => 'projects', 'action' => 'location'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/projects/plan/*', 
		array('controller' => 'projects', 'action' => 'plan'),
		array('language' => '[a-z]{2}')
	);

	Router::connect('/:language/page/*', 
		array('controller' => 'pages', 'action' => 'page'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/category', 
		array('controller' => 'categories', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/category/*', 
		array('controller' => 'categories', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/contacts', 
		array('controller' => 'pages', 'action' => 'contacts'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/news/view/*', 
		array('controller' => 'news', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/:controller/:action/*', 
		array('controller' => ':controller', 'action' => ':action', '*'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/:controller/*', 
		array('controller' => ':controller', 'action' => 'index', '*'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/admin/users/:action', array('controller' => 'users'));
	Router::connect('/admin/service/:action/*', array('controller' => 'services', 'admin' => true));
	Router::connect('/', array('controller' => 'pages', 'action' => 'index', 'Главная'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/projects/plan/*', array('controller' => 'projects', 'action' => 'plan'));
	Router::connect('/category', array('controller' => 'categories', 'action' => 'index'));
	Router::connect('/category/*', array('controller' => 'categories', 'action' => 'view'));
	
	Router::connect('/contacts', array('controller' => 'pages', 'action' => 'contacts'));
	Router::connect('/purchase', array('controller' => 'pages', 'action' => 'purchase'));
	Router::connect('/scheme', array('controller' => 'pages', 'action' => 'scheme'));

	Router::connect('/product/*', array('controller' => 'products', 'action' => 'view'));
	Router::connect('/page/*', array('controller' => 'pages', 'action' => 'page'));
	Router::connect('/service/view/*', array('controller' => 'services', 'action' => 'view'));
	Router::connect('/article/view/*', array('controller' => 'articles', 'action' => 'view'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
