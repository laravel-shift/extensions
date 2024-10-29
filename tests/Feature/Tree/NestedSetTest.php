<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Tree;

use LaravelDoctrineTest\Extensions\Assets\Tree\NestedSetEntity;
use PHPUnit\Framework\TestCase;

class NestedSetTest extends TestCase
{
    protected NestedSetEntity $entity;

    public function setUp(): void
    {
        $this->entity = new NestedSetEntity();
    }

    public function testCanSetRoot(): void
    {
        $this->entity->setRoot(10);

        $this->assertEquals(10, $this->entity->getRoot());
    }

    public function testCanSetLevel(): void
    {
        $this->entity->setLevel(5);

        $this->assertEquals(5, $this->entity->getLevel());
    }

    public function testCanSetLeft(): void
    {
        $this->entity->setLeft(3);

        $this->assertEquals(3, $this->entity->getLeft());
    }

    public function testCanSetRight(): void
    {
        $this->entity->setRight(2);

        $this->assertEquals(2, $this->entity->getRight());
    }
}
