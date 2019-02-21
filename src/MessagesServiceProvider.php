<?php

namespace Davidcb\Messages;

use Illuminate\Support\ServiceProvider;

class MessagesServiceProvider extends ServiceProvider {

	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'messages');
	}

	public function register()
	{
		//
	}

}
