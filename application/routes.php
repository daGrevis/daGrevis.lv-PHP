<?php

Route::set('article', 'article/<id>(/<slug>)', array('id' => '\d+'))
	->defaults(array(
		'controller' => 'article',
		'action'     => 'view',
	));

Route::set('dashboard', 'dashboard')
	->defaults(array(
		'controller' => 'dashboard',
		'action'     => 'index',
	));

Route::set('dashboard/blog', 'dashboard/blog(/<action>(/<id>(/<id2>(/<id3>(/<id4>)))))')
	->defaults(array(
		'directory'  => 'dashboard',
		'controller' => 'blog',
		'action'     => 'list',
	));

Route::set('dashboard/cms', 'dashboard/cms(/<action>(/<id>(/<id2>(/<id3>(/<id4>)))))')
	->defaults(array(
		'directory'  => 'dashboard',
		'controller' => 'cms',
		'action'     => 'list',
	));

Route::set('page', 'page/<id>', array('id' => '\d+'))
	->defaults(array(
		'controller' => 'page',
		'action'     => 'view',
	));

Route::set('default', '(<controller>(/<action>(/<id>(/<id2>(/<id3>(/<id4>))))))')
	->defaults(array(
		'controller' => 'landing',
		'action'     => 'index',
	));