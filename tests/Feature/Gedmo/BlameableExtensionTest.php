<?php

declare(strict_types=1);

namespace LaravelDoctrineTest\Extensions\Feature\Gedmo;

use LaravelDoctrine\Extensions\Blameable\BlameableExtension;
use LaravelDoctrineTest\Extensions\Assets\User;
use LaravelDoctrineTest\Extensions\Entity\Blameable;
use LaravelDoctrineTest\Extensions\Feature\TestCase;

class BlameableExtensionTest extends TestCase
{
    public function testExtensionWorks(): void
    {
        $user = new User();

        auth()->setUser($user);

        $extension = new BlameableExtension();

        $extension->addSubscribers(
            $this->evm,
            $this->em,
        );

        $this->assertEmpty($extension->getFilters());

        $blamable = new Blameable();

        $this->em->persist($blamable);
        $this->em->flush();

        $this->assertNotNull($blamable->createdBy);
        $this->assertNotNull($blamable->updatedBy);

        $this->assertEquals($user->getUserIdentifier(), $blamable->createdBy);
        $this->assertEquals($user->getUserIdentifier(), $blamable->updatedBy);
    }
}
