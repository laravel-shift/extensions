<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Gedmo;

use LaravelDoctrine\Extensions\Timestamps\TimestampableExtension;
use LaravelDoctrineTest\Extensions\Entity\Timestamps;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

class TimestampableExtensionTest extends TestCase
{
    public function testExtensionWorks(): void
    {
        $extension = new TimestampableExtension();

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $entity = new Timestamps();

        $this->em->persist($entity);
        $this->em->flush();

        $this->assertNotNull($entity->createdAt);
        $this->assertNotNull($entity->updatedAt);
    }
}
