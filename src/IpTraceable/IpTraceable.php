<?php

declare(strict_types=1);

namespace LaravelDoctrine\Extensions\IpTraceable;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait IpTraceable
{
    /**
     * @ORM\Column(length=45, nullable=true)
     *
     * @Gedmo\IpTraceable(on="create")
     */
    #[Gedmo\IpTraceable(on: 'create')]
    #[ORM\Column(length: 45, nullable: true)]
    protected string $createdFromIp;

    /**
     * @ORM\Column(length=45, nullable=true)
     *
     * @Gedmo\IpTraceable(on="update")
     */
    #[Gedmo\IpTraceable(on: 'update')]
    #[ORM\Column(length: 45, nullable: true)]
    protected string $updatedFromIp;

    /**
     * Sets createdFromIp.
     *
     * @return $this
     */
    public function setCreatedFromIp(string $createdFromIp)
    {
        $this->createdFromIp = $createdFromIp;

        return $this;
    }

    /**
     * Returns createdFromIp.
     */
    public function getCreatedFromIp(): string
    {
        return $this->createdFromIp;
    }

    /**
     * Sets updatedFromIp.
     *
     * @return $this
     */
    public function setUpdatedFromIp(string $updatedFromIp)
    {
        $this->updatedFromIp = $updatedFromIp;

        return $this;
    }

    /**
     * Returns updatedFromIp.
     */
    public function getUpdatedFromIp(): string
    {
        return $this->updatedFromIp;
    }
}
