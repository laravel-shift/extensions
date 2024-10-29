<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Blameable;

use Illuminate\Contracts\Auth\Guard;
use LaravelDoctrine\Extensions\Blameable\BlameableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

class BlameableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $extension = new BlameableExtension(
            m::mock(Guard::class),
        );

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
