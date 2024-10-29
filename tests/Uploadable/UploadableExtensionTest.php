<?php

use Gedmo\Uploadable\UploadableListener;
use LaravelDoctrine\Extensions\Uploadable\UploadableExtension;
use Mockery as m;

class UploadableExtensionTest extends ExtensionTestCase
{
    public function test_can_register_extension()
    {
        $listener = m::mock(UploadableListener::class);

        $extension = new UploadableExtension(
            $listener
        );

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
