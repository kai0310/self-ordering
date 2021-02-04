<?php

namespace Tests;

use Livewire\LivewireServiceProvider;
use Revolution\Ordering\Providers\OrderingServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Load package service provider.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            OrderingServiceProvider::class,
        ];
    }

    /**
     * Load package alias.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            //
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('ordering.payment.paypay', [
            'production'  => false,
            'api_key'     => 'test',
            'api_secret'  => 'test',
            'merchant_id' => 'test',
        ]);
    }
}
