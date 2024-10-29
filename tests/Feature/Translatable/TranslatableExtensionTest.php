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
        $extension = app(TranslatableExtension::class);
        $extension->addSubscribers($this->evm, $this->em);

        $this->app['events']->dispatch('locale.changed', ['en']);

        $this->assertEmpty($extension->getFilters());
    }
}
