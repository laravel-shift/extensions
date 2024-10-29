<?php

namespace LaravelDoctrine\Extensions\Translatable;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Translatable\TranslatableListener;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use LaravelDoctrine\Extensions\GedmoExtension;

class TranslatableExtension extends GedmoExtension
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @var Dispatcher
     */
    private $events;

    /**
     * @param Application $application
     * @param Repository  $repository
     * @param Dispatcher  $events
     */
    public function __construct(Application $application, Repository $repository, Dispatcher $events)
    {
        $this->application = $application;
        $this->repository  = $repository;
        $this->events      = $events;
    }

    /**
     * @param EventManager           $manager
     * @param EntityManagerInterface $em
     */
    public function addSubscribers(EventManager $manager, EntityManagerInterface $em): void
    {
        $subscriber = new TranslatableListener;
        $subscriber->setTranslatableLocale($this->application->getLocale());
        $subscriber->setDefaultLocale($this->repository->get('app.locale'));

        $this->addSubscriber($subscriber, $manager);

        $this->events->listen('locale.changed', function ($locale) use ($subscriber) {
            $subscriber->setTranslatableLocale($locale);
        });
    }

    /**
     * @return mixed[]
     */
    public function getFilters(): array
    {
        return [];
    }
}
