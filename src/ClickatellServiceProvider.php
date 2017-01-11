<?php

namespace Ccom\Clickatell;

use Illuminate\Support\ServiceProvider;

class ClickatellServiceProvider extends ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
	    $this->publishes([
	        __DIR__.'/config/clickatell.php' => config_path('clickatell.php'),
	    ]);
	}

	/**
	 * Register Application
	 */
	public function register()
	{
		
	}
}