<?php 

namespace Config;

return [ 
    'homepage' => [
    	'path' => '/',
    	'action' => App\Controler\HomeControler::class,
    	'method' => '',
    	'params' => [
			':id' => ''
		]
	],

	'posts' => [
		'path' => '/posts',
		'action' => App\Controler\BlogControler::class,
		'method' => '',
		'params' => [
			':id' => ''
		]
	],

	'posts_details' => [
		'path' => '/posts/:id',
		'action' => App\Controler\PostControler::class,
		'method' => '',
		'params' => [
			':id' => '#\\d+#'
		]

	],

	'post_add' =>[

		'path' => '/post/add',
		'action' => App\Controler\AddPostControler::class,
		'method' => 'POST',
		'params' => [
			':id' => ''
		]
	],

	'post_Modify' =>[

		'path' => '/post/modify/:id',
		'action' => App\Controler\ModifyPostControler::class,
		'method' => 'POST',
		'params' => [
			':id' => '#\\d+#'
		]
	],
	'contact' =>[

		'path' => '/contact',
		'action' => App\Controler\ContactControler::class,
		'method' => 'POST',
		'params' => [
			':id' => ''
		]
	],

	'send_mail' =>[

		'path' => '/sendMail',
		'action' => App\Controler\MailControler::class,
		'method' => 'POST',
		'params' => [
			':id' => ''
		]
	]
];



