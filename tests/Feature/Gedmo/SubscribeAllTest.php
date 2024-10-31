<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Gedmo;

use Gedmo\SoftDeleteable\Filter\SoftDeleteableFilter;
use Gedmo\Uploadable\UploadableListener;
use Illuminate\Http\Request;
use LaravelDoctrine\Extensions\Blameable\BlameableExtension;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension;
use LaravelDoctrine\Extensions\Loggable\LoggableExtension;
use LaravelDoctrine\Extensions\Sluggable\SluggableExtension;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeleteableExtension;
use LaravelDoctrine\Extensions\Sortable\SortableExtension;
use LaravelDoctrine\Extensions\Timestamps\TimestampableExtension;
use LaravelDoctrine\Extensions\Translatable\TranslatableExtension;
use LaravelDoctrine\Extensions\Tree\TreeExtension;
use LaravelDoctrine\Extensions\Uploadable\UploadableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

/**
 * This test case is used to test all Gedmo extensions at once.
 * The point of this repository is not to test the functionality of the extensions,
 * but to test if they can be registered without any errors.
 */
class SubscribeAllTest extends TestCase
{
    public function testCanRegisterBlameable(): void
    {
        $extension = new BlameableExtension();
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterIpTraceable(): void
    {
        $request = m::mock(Request::class);

        $request->shouldReceive('getClientIp')
            ->once()->andReturn('127.0.0.1');

        $extension = new IpTraceableExtension($request);
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterLoggable(): void
    {
        $extension = new LoggableExtension();
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterTimestampable(): void
    {
        $extension = new TimestampableExtension();
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterSluggable(): void
    {
        $extension = new SluggableExtension();
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterSoftDeletes(): void
    {
        $extension = new SoftDeleteableExtension();
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEquals($extension->getFilters(), ['soft-deleteable' => SoftDeleteableFilter::class]);
    }

    public function testCanRegisterSortable(): void
    {
        $extension = new SortableExtension();
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterTranslatable(): void
    {
        $extension = app(TranslatableExtension::class);
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterTree(): void
    {
        $extension = new TreeExtension();
        $extension->addSubscribers($this->evm, $this->em);

        $this->assertTrue(true);
        $this->assertEmpty($extension->getFilters());
    }

    public function testCanRegisterUploadable(): void
    {
        $extension = new UploadableExtension(app(UploadableListener::class));

        $this->assertEmpty($extension->getFilters());
    }
}
