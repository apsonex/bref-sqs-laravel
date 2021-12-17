<?php namespace Apsonex\BrefSqs\Sqs\Laravel;

use Apsonex\BrefSqs\Sqs\Laravel\Commands\SqsWorkCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->singleton('command.sqs.work', function ($app) {
            return new SqsWorkCommand($app['queue.worker'], $app['cache.store']);
        });

        $this->commands(['command.sqs.work']);
    }

    public function provides()
    {
        return [
            'command.sqs.work',
        ];
    }
}
