<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use Illuminate\Contracts\Foundation\Application;
use LaravelDoctrine\Extensions\BeberleiExtensionsServiceProvider;
use LaravelDoctrine\ORM\DoctrineManager;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class BeberleiExtensionsServiceProviderTest extends TestCase
{
    protected Application $app;
    protected BeberleiExtensionsServiceProvider $provider;
    protected DoctrineManager $manager;

    public function setUp(): void
    {
        $this->app     = m::mock(Application::class);
        $this->manager = m::mock(DoctrineManager::class);

        $this->provider = new BeberleiExtensionsServiceProvider($this->app);

        // silence the 'This test did not perform any assertions' warning
        $this->assertTrue(true);
    }

    public function testCustomFunctionsCanBeRegistered(): void
    {
        $this->manager->shouldReceive('extendAll')->once();

        $this->provider->boot($this->manager);
    }

    public function tearDown(): void
    {
        m::close();
    }
}
