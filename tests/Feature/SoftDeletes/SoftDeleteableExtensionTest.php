<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\SoftDeletes;

use Gedmo\SoftDeleteable\Filter\SoftDeleteableFilter;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeleteableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

class SoftDeleteableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $extension = new SoftDeleteableExtension();

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertContains(SoftDeleteableFilter::class, $extension->getFilters());
    }
}
