<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Loggable;

use Illuminate\Contracts\Auth\Guard;
use LaravelDoctrine\Extensions\Loggable\LoggableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

class LoggableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $guard = m::mock(Guard::class);

        $extension = new LoggableExtension(
            $guard,
        );

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
