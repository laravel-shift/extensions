<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Translatable;

use LaravelDoctrine\Extensions\Translatable\TranslatableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

use function app;

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
