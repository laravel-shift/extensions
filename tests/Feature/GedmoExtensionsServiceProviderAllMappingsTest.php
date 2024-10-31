<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use Illuminate\Config\Repository;

use function tap;

class GedmoExtensionsServiceProviderAllMappingsTest extends TestCase
{
    protected function defineEnvironment(mixed $app): void
    {
        parent::defineEnvironment($app);

        // Setup default database to use sqlite :memory:
        tap($app['config'], static function (Repository $config): void {
            $config->set('doctrine.gedmo.all_mappings', true);
        });
    }

    public function testCustomExtensionsCanBeRegistered(): void
    {
        $this->app['events']->dispatch('doctrine.extensions.booting');

        $this->assertTrue(true);
    }
}
