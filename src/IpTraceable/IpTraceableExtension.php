<?php

namespace LaravelDoctrine\Extensions\IpTraceable;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\IpTraceable\IpTraceableListener;
use Illuminate\Http\Request;
use LaravelDoctrine\Extensions\GedmoExtension;

class IpTraceableExtension extends GedmoExtension
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param EventManager           $manager
     * @param EntityManagerInterface $em
     */
    public function addSubscribers(EventManager $manager, EntityManagerInterface $em): void
    {
        $subscriber = new IpTraceableListener();
        $subscriber->setIpValue($this->request->getClientIp());

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
