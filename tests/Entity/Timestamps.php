<?php

namespace LaravelDoctrineTest\Extensions\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
class Timestamps
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    public $id;

    #[ORM\Column(type: "datetime_immutable", nullable: false)]
    #[Gedmo\Timestampable(on: "create", field: "createdAt")]
    public $createdAt;

    #[ORM\Column(type: "datetime", nullable: false)]
    #[Gedmo\Timestampable(on: "update", field: "updatedAt")]
    public $updatedAt;
}
