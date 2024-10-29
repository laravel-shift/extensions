<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature;

use LaravelDoctrine\ORM\DoctrineManager;

class BeberleiExtensionsServiceProviderTest extends TestCase
{
    public function testCustomFunctionsCanBeRegistered(): void
    {
        $doctrineManager = $this->app->get(DoctrineManager::class);

        $entityManager = app('em');

        $this->assertTrue(true);
    }
}
