<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Translatable;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use LaravelDoctrine\Extensions\Translatable\TranslatableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

class TranslatableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $app = m::mock(Application::class);
        $app->shouldReceive('getLocale')->once()->andReturn('en');

        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
               ->with('app.locale')->once()
               ->andReturn('en');

        $events = m::mock(Dispatcher::class);
        $events->shouldReceive('listen')
            ->with('locale.changed', m::type('callable'))
            ->once();

        $extension = new TranslatableExtension($app, $config, $events);

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
