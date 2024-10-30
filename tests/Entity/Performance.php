<?php

namespace LaravelDoctrineTest\Extensions\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Performance
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    private $id;

    #[ORM\Column(type: "string", nullable: true)]
    private $venue;

    #[ORM\Column(type: "string", nullable: true)]
    private $city;

    #[ORM\Column(type: "string", nullable: true)]
    private $state;

    #[ORM\Column(type: "date", nullable: false)]
    private $performanceDate;

    #[ORM\OneToMany(targetEntity: \LaravelDoctrineTest\Extensions\Entity\Recording::class, mappedBy: "performance")]
    private $recordings;

    #[ORM\ManyToOne(targetEntity: \LaravelDoctrineTest\Extensions\Entity\Artist::class, inversedBy: "performances")]
    #[ORM\JoinColumn(name: "artist_id", referencedColumnName: "id", nullable: false)]
    private $artist;
}