<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Tree;

use LaravelDoctrine\Extensions\Tree\TreeExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

class TreeExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $extension = new TreeExtension();

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
