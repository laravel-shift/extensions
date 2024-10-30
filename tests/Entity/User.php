<?php

namespace LaravelDoctrineTest\Extensions\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    private $id;

    #[ORM\Column(type: "string", nullable: false)]
    private $name;

    #[ORM\Column(type: "string", unique: true, nullable: false)]
    private $email;

    #[ORM\Column(type: "string", nullable: false)]
    private $password;

    #[ORM\Column(type: "string", nullable: false)]
    private $role;

    #[ORM\ManyToMany(targetEntity: \LaravelDoctrineTest\Extensions\Entity\Recording::class, inversedBy: "users")]
    #[ORM\JoinTable(name: "RecordingToUser")]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", nullable: false)]
    #[ORM\InverseJoinColumn(name: "recording_id", referencedColumnName: "id", nullable: false)]
    private $recordings;
}