<?php

namespace LaravelDoctrine\Extensions\Uploadable;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Uploadable\UploadableListener;
use LaravelDoctrine\Extensions\GedmoExtension;

class UploadableExtension extends GedmoExtension
{
    /**
     * @var UploadableListener
     */
    protected $listener;

    /**
     * @param UploadableListener $listener
     */
    public function __construct(UploadableListener $listener)
    {
        $this->listener = $listener;
    }

    /**
     * @param EventManager           $manager
     * @param EntityManagerInterface $em
     */
    public function addSubscribers(EventManager $manager, EntityManagerInterface $em): void
    {
        $this->addSubscriber($this->listener, $manager);
    }

    /**
     * @return mixed[]
     */
    public function getFilters(): array
    {
        return [];
    }
}
