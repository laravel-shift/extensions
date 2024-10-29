<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Mockery as m;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

use function restore_error_handler;
use function restore_exception_handler;

abstract class TestCase extends OrchestraTestCase
{
    use WithWorkbench;

    protected EventManager $evm;
    protected EntityManagerInterface $em;

    public function setUp(): void
    {
        $this->evm = m::mock(EventManager::class);
        $this->em  = m::mock(EntityManagerInterface::class);

        $this->evm->shouldReceive('addEventSubscriber')->once();

        parent::setUp();
    }

    public function tearDown(): void
    {
        restore_error_handler();
        restore_exception_handler();

        m::close();

        parent::tearDown();
    }
}
