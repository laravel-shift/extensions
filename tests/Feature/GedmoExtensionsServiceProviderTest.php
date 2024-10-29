<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use LaravelDoctrine\ORM\DoctrineManager;
use Illuminate\Events\Dispatcher;

class GedmoExtensionsServiceProviderTest extends TestCase
{
    public function testCustomExtensionsCanBeRegistered(): void
    {
        $this->app['events']->dispatch('doctrine.extensions.booting');

        $this->assertTrue(true);
    }
}
