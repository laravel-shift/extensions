<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Uploadable;

use Gedmo\Uploadable\UploadableListener;
use Illuminate\Contracts\Foundation\Application;
use LaravelDoctrine\Extensions\Uploadable\UploadableExtensionServiceProvider;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class UploadableExtensionServiceProviderTest extends TestCase
{
    protected Application $app;

    protected UploadableExtensionServiceProvider $provider;

    public function setUp(): void
    {
        $this->app = m::mock(Application::class);

        $this->provider = new UploadableExtensionServiceProvider($this->app);
    }

    public function testListenerGetsBoundAsSingleton(): void
    {
        $this->app->shouldReceive('singleton')
                  ->once()
                  ->with(UploadableListener::class);

        $this->provider->register();

        // silence the 'This test did not perform any assertions' warning
        $this->assertTrue(true);
    }

    public function tearDown(): void
    {
        m::close();
    }
}
