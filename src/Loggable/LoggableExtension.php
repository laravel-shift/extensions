<?php

namespace LaravelDoctrine\Extensions\Loggable;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Loggable\LoggableListener;
use LaravelDoctrine\Extensions\GedmoExtension;
use LaravelDoctrine\Extensions\ResolveUserDecorator;

class LoggableExtension extends GedmoExtension
{

    /**
     * @param EventManager           $manager
     * @param EntityManagerInterface $em
     */
    public function addSubscribers(EventManager $manager, EntityManagerInterface $em): void
    {
        $subscriber = new ResolveUserDecorator(
            new LoggableListener,
            'setUsername'
        );

        $this->addSubscriber($subscriber, $manager);
    }

    /**
     * @return mixed[]
     */
    public function getFilters(): array
    {
        return [];
    }
}
