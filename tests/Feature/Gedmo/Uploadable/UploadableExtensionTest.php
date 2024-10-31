<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Gedmo\Uploadable;

use Gedmo\Uploadable\UploadableListener;
use LaravelDoctrine\Extensions\Uploadable\UploadableExtension;
use LaravelDoctrine\Extensions\Uploadable\UploadableFacade;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

class UploadableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $this->assertInstanceOf(UploadableListener::class, UploadableFacade::getFacadeRoot());

        $listener = m::mock(UploadableListener::class);

        $extension = new UploadableExtension(
            app(UploadableListener::class),
        );

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
