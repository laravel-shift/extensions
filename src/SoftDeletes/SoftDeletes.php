<?php

declare(strict_types=1);

namespace LaravelDoctrine\Extensions\SoftDeletes;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait SoftDeletes
{
    #[ORM\Column(name: 'deleted_at', type: 'datetime', nullable: true)]
    protected DateTime|null $deletedAt = null;

    public function getDeletedAt(): DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(DateTime|null $deletedAt = null): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * Restore the soft-deleted state
     */
    public function restore(): void
    {
        $this->deletedAt = null;
    }

    public function isDeleted(): bool
    {
        return $this->deletedAt && new DateTime('now') >= $this->deletedAt;
    }
}
