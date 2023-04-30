<?php
return [
	'api' =>
	[
		'base_api_path' => 'https://deployer.bulutly.net/digital-ocean',
		'droplets' => [
			'index' => 'droplets',
			'single' => 'droplets/{id}',
			'history' => 'droplets/{id}/actions/history',
			'reboot' => 'droplets/{id}/actions/reboot',
			'start' => 'droplets/{id}/actions/start',
			'shutdown' => 'droplets/{id}/actions/shutdown',

		],
		'images'=>[
			'index'=>'droplets/images'
		],
		'sizes'=>[
			'index'=>'droplets/sizes'
		],
	]
];