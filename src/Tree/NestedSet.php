<?php

declare(strict_types=1);

namespace LaravelDoctrine\Extensions\Tree;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait NestedSet
{
    /**
     * @ORM\Column(name="root", type="integer", nullable=true)
     *
     * @Gedmo\TreeRoot
     */
    #[Gedmo\TreeRoot]
    #[ORM\Column(name: 'root', type: 'integer', nullable: true)]
    protected int $root;

    /**
     * @ORM\Column(name="lvl", type="integer")
     *
     * @Gedmo\TreeLevel
     */
    #[Gedmo\TreeLevel]
    #[ORM\Column(name: 'lvl', type: 'integer')]
    protected int $level;

    /**
     * @ORM\Column(name="lft", type="integer")
     *
     * @Gedmo\TreeLeft
     */
    #[Gedmo\TreeLeft]
    #[ORM\Column(name: 'lft', type: 'integer')]
    protected int $left;

    /**
     * @ORM\Column(name="rgt", type="integer")
     *
     * @Gedmo\TreeRight
     */
    #[Gedmo\TreeRight]
    #[ORM\Column(name: 'rgt', type: 'integer')]
    protected int $right;

    public function getRoot(): int
    {
        return $this->root;
    }

    public function setRoot(int $root): void
    {
        $this->root = $root;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getLeft(): int
    {
        return $this->left;
    }

    public function setLeft(int $left): void
    {
        $this->left = $left;
    }

    public function getRight(): int
    {
        return $this->right;
    }

    public function setRight(int $right): void
    {
        $this->right = $right;
    }
}
