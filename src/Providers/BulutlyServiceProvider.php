<?php

namespace Bulutly\Laravel\Providers;

use Illuminate\Support\ServiceProvider;

class BulutlyServiceProvider extends ServiceProvider
{
	public function boot()
	{

		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../Config/config.php' => config_path('bulutly.php'),
			], 'config');
		}
	}

	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'bulutly');
	}
}
