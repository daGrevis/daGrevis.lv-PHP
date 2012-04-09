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

Route::set('default', '(<controller>(/<action>(/<id>(/<id2>(/<id3>(/<id4>))))))')
	->defaults(array(
		'controller' => 'landing',
		'action'     => 'index',
	));