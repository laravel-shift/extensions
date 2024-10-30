<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Illuminate\Config\Repository;
use LaravelDoctrineTest\Extensions\Entity\Artist;
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

    protected function defineEnvironment($app)
    {
        // Setup default database to use sqlite :memory:
        tap($app['config'], function (Repository $config) {
            $config->set('doctrine.managers.default', [
                'meta' => 'attributes',
                'connection' => 'testbench',
                'paths' => [
                    __DIR__ . '/../Entity'
                ],
                'proxies' => [
                    'auto_generate' => true,
                    'path' => __DIR__ . '/../proxy',
                    'namespace' => 'Proxy',
                ]
            ]);

            $config->set('database.connections.testbench', [
                'driver'   => 'sqlite',
                'database' => ':memory:',
                'prefix'   => '',
            ]);
        });
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->em = $this->app->get(EntityManager::class);
        $this->evm = $this->em->getEventManager();

        (new SchemaTool($this->em))->createSchema($this->em->getMetadataFactory()->getAllMetadata());
    }

    public function tearDown(): void
    {
        restore_error_handler();
        restore_exception_handler();

        unset($this->em, $this->evm);

        m::close();

        parent::tearDown();
    }
}
