<?php namespace iakio\dbstart\Providers;

use Illuminate\Support\ServiceProvider;

class DbStartCommandProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            'iakio\dbstart\Commands\DbStartCommand',
            'iakio\dbstart\Commands\InitCommand',
            'iakio\dbstart\Commands\StartCommand',
            'iakio\dbstart\Commands\CreateDbCommand',
        ]);
        $this->app->make('config')->set(
            "dbstart.path", storage_path() . DIRECTORY_SEPARATOR . "data"
        );
    }
}
