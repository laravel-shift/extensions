<?php

namespace LaravelDoctrineTest\Extensions\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
class Blameable
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    public $id;

    #[ORM\Column(type: "string", nullable: false)]
    #[Gedmo\Blameable(on: "create", field: "createdBy")]
    public $createdBy;

    #[ORM\Column(type: "string", nullable: false)]
    #[Gedmo\Blameable(on: "update", field: "updatedBy")]
    public $updatedBy;
}
