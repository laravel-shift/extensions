<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use Illuminate\Config\Repository;
use LaravelDoctrine\ORM\DoctrineManager;
use Illuminate\Events\Dispatcher;

class GedmoExtensionsServiceProviderAllMappingsTest extends TestCase
{
    protected function defineEnvironment($app)
    {
        // Setup default database to use sqlite :memory:
        tap($app['config'], function (Repository $config) {
            $config->set('doctrine.gedmo.all_mappings', true);
        });
    }

    public function testCustomExtensionsCanBeRegistered(): void
    {
        $this->app['events']->dispatch('doctrine.extensions.booting');

        $this->assertTrue(true);
    }
}
