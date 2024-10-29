<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\IpTraceable;

use LaravelDoctrineTest\Extensions\Assets\IpTraceable\IpTraceableEntity;
use PHPUnit\Framework\TestCase;

class IpTraceableTest extends TestCase
{
    protected IpTraceableEntity $entity;

    public function setUp(): void
    {
        $this->entity = new IpTraceableEntity();
    }

    public function testCanBeSetCreatedFromIp(): void
    {
        $this->entity->setCreatedFromIp('CREATED_IP');

        $this->assertEquals('CREATED_IP', $this->entity->getCreatedFromIp());
    }

    public function testCanSetUpdatedFromIp(): void
    {
        $this->entity->setUpdatedFromIp('UPDATED_IP');

        $this->assertEquals('UPDATED_IP', $this->entity->getUpdatedFromIp());
    }
}
