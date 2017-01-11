<?php

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
}