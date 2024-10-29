<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\IpTraceable;

use Illuminate\Http\Request;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

class IpTraceableExtensionTest extends TestCase
{
    public function testCanRegisterExtension(): void
    {
        $request = m::mock(Request::class);

        $request->shouldReceive('getClientIp')
            ->once()->andReturn('127.0.0.1');

        $extension = new IpTraceableExtension(
            $request,
        );

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());
    }
}
