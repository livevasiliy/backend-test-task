<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Coupon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $code;

    #[ORM\Column(type: 'decimal', scale: 2)]
    private float $discount;

    #[ORM\Column(type: 'boolean')]
    private bool $isPercentage;

    #[ORM\ManyToOne(targetEntity: CouponType::class)]
    #[ORM\JoinColumn(nullable: false)]
    private CouponType $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;
        return $this;
    }

    public function isPercentage(): bool
    {
        return $this->isPercentage;
    }

    public function setIsPercentage(bool $isPercentage): self
    {
        $this->isPercentage = $isPercentage;
        return $this;
    }

    public function getType(): CouponType
    {
        return $this->type;
    }

    public function setType(CouponType $type): self
    {
        $this->type = $type;
        return $this;
    }
}
