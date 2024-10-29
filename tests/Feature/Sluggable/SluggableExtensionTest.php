<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Sluggable;

use LaravelDoctrine\Extensions\Sluggable\SluggableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

class SluggableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $extension = new SluggableExtension();

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
