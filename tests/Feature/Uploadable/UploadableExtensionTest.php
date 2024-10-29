<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Uploadable;

use Gedmo\Uploadable\UploadableListener;
use LaravelDoctrine\Extensions\Uploadable\UploadableExtension;
use LaravelDoctrine\Extensions\Uploadable\UploadableFacade;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

class UploadableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $this->assertFalse(UploadableFacade::isFake());

        $listener = m::mock(UploadableListener::class);

        $extension = new UploadableExtension(
            $listener,
        );

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
