<?php

namespace App\Entity\Trait;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
trait HasCreatedAt
{
    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        $this->createdAt ??= new DateTimeImmutable();
    }
}