<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Sortable;

use LaravelDoctrine\Extensions\Sortable\SortableExtension;
use LaravelDoctrine\Extensions\Timestamps\TimestampableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

class SortableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $extension = new SortableExtension();

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
