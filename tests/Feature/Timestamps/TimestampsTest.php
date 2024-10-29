<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Timestamps;

use DateTime;
use LaravelDoctrineTest\Extensions\Assets\Timestamps\TimestampsEntity;
use PHPUnit\Framework\TestCase;

class TimestampsTest extends TestCase
{
    protected TimestampsEntity $entity;

    public function setUp(): void
    {
        $this->entity = new TimestampsEntity();
    }

    public function testCanSetCreatedAt(): void
    {
        $date = new DateTime('now');

        $this->entity->setCreatedAt($date);

        $this->assertEquals($date, $this->entity->getCreatedAt());
    }

    public function testCanSetUpdatedAt(): void
    {
        $date = new DateTime('now');

        $this->entity->setUpdatedAt($date);

        $this->assertEquals($date, $this->entity->getUpdatedAt());
    }
}
