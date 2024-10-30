<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Gedmo;

use Illuminate\Http\Request;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension;
use LaravelDoctrineTest\Extensions\Entity\IpTraceable;
use LaravelDoctrineTest\Extensions\Feature\TestCase;
use Mockery as m;

class IpTraceableExtensionTest extends TestCase
{
    public function testExtensionWorks(): void
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

        $ipTracable = new IpTraceable();

        $this->em->persist($ipTracable);
        $this->em->flush();

        $this->assertNotNull($ipTracable->createdFromIp);
        $this->assertNotNull($ipTracable->updatedFromIp);

        $this->assertEquals('127.0.0.1', $ipTracable->createdFromIp);
        $this->assertEquals('127.0.0.1', $ipTracable->updatedFromIp);
    }
}
