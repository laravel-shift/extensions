<?php

namespace LaravelDoctrineTest\Extensions\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Recording
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    private $id;

    #[ORM\Column(type: "text", nullable: false)]
    private $source;

    #[ORM\ManyToOne(targetEntity: \LaravelDoctrineTest\Extensions\Entity\Performance::class, inversedBy: "recordings")]
    #[ORM\JoinColumn(name: "performance_id", referencedColumnName: "id", nullable: false)]
    private $performance;

    #[ORM\ManyToMany(targetEntity: \LaravelDoctrineTest\Extensions\Entity\User::class, mappedBy: "recordings")]
    private $users;
}