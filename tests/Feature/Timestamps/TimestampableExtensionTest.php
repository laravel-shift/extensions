<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Timestamps;

use LaravelDoctrine\Extensions\Timestamps\TimestampableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

class TimestampableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $extension = new TimestampableExtension();

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
