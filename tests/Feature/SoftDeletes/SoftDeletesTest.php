<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\SoftDeletes;

use DateTime;
use LaravelDoctrineTest\Extensions\Assets\SoftDeletes\SoftDeletesEntity;
use PHPUnit\Framework\TestCase;

class SoftDeletesTest extends TestCase
{
    protected SoftDeletesEntity $entity;

    public function setUp(): void
    {
        $this->entity = new SoftDeletesEntity();
    }

    public function testCanSetDeletedAt(): void
    {
        $date = new DateTime('now');

        $this->entity->setDeletedAt($date);

        $this->assertEquals($date, $this->entity->getDeletedAt());
    }

    public function testCanCheckIfDeleted(): void
    {
        $this->assertFalse($this->entity->isDeleted());

        $this->entity->setDeletedAt(new DateTime('now'));
        $this->assertTrue($this->entity->isDeleted());
    }

    public function testCanRestore(): void
    {
        $this->entity->setDeletedAt(new DateTime('now'));
        $this->assertTrue($this->entity->isDeleted());

        $this->entity->restore();
        $this->assertFalse($this->entity->isDeleted());
    }
}
