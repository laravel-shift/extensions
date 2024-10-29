<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Mockery as m;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    protected EventManager $evm;
    protected EntityManagerInterface $em;

    public function setUp(): void
    {
        $this->evm = m::mock(EventManager::class);
        $this->evm->shouldReceive('addEventSubscriber')->once();

        $this->em = m::mock(EntityManagerInterface::class);
    }

    public function tearDown(): void
    {
        m::close();
    }
}
