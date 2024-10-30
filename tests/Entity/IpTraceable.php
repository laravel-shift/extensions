<?php

namespace LaravelDoctrineTest\Extensions\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
class IpTraceable
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    public $id;

    #[ORM\Column(type: "string", nullable: false)]
    #[Gedmo\IpTraceable(on: "create", field: "createdFromIp")]
    public $createdFromIp;

    #[ORM\Column(type: "string", nullable: false)]
    #[Gedmo\IpTraceable(on: "update", field: "updatedFromIp")]
    public $updatedFromIp;
}
