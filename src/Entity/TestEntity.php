<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Enum\TestEnum;
use App\Repository\TestEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TestEntityRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['test:read']],
    denormalizationContext: ['groups' => ['test:write']],
)]
class TestEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: false, enumType: TestEnum::class)]
    #[Groups(['test:read', 'test:write'])]
    #[Assert\Choice(callback: [TestEnum::class, 'cases'])]
    #[Assert\NotBlank]
    private ?TestEnum $state = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getState(): ?TestEnum
    {
        return $this->state;
    }

    public function setState(TestEnum $state): static
    {
        $this->state = $state;

        return $this;
    }
}
