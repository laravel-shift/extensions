<?php

namespace LaravelDoctrineTest\Extensions\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
class Artist
{
    #[ORM\Id]
    #[ORM\Column(type: "bigint")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    public $id;

    #[ORM\Column(type: "string", unique: true, nullable: false)]
    public $name;

    #[ORM\Column(type: "datetime_immutable", nullable: false)]
    #[Gedmo\Timestampable(on: "create", field: "createdAt")]
    public $createdAt;

    #[ORM\Column(type: "datetime", nullable: false)]
    #[Gedmo\Timestampable(on: "update", field: "updatedAt")]
    public $updatedAt;

    #[ORM\OneToMany(targetEntity: \LaravelDoctrineTest\Extensions\Entity\Performance::class, mappedBy: "artist")]
    public $performances;
}
