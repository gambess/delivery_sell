<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=50, nullable=false)
     */
    private $barcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="inventary_min", type="integer", nullable=false, options={"default"="10"})
     */
    private $inventaryMin = '10';

    /**
     * @var float|null
     *
     * @ORM\Column(name="price_in", type="float", precision=24, scale=8, nullable=true)
     */
    private $priceIn;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price_out", type="float", precision=24, scale=8, nullable=true)
     */
    private $priceOut;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unit", type="string", length=255, nullable=true, options={"default"="Gr"})
     */
    private $unit = 'Gr';

    /**
     * @var string|null
     *
     * @ORM\Column(name="presentation", type="string", length=255, nullable=true, options={"default"="Bolsa"})
     */
    private $presentation = 'Bolsa';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $isActive = true;

    /**
     * @var int|null
     *
     * @ORM\Column(name="provider_id", type="integer", nullable=true, options={"default"="480"})
     */
    private $providerId = '480';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getInventaryMin(): ?int
    {
        return $this->inventaryMin;
    }

    public function setInventaryMin(int $inventaryMin): self
    {
        $this->inventaryMin = $inventaryMin;

        return $this;
    }

    public function getPriceIn(): ?float
    {
        return $this->priceIn;
    }

    public function setPriceIn(?float $priceIn): self
    {
        $this->priceIn = $priceIn;

        return $this;
    }

    public function getPriceOut(): ?float
    {
        return $this->priceOut;
    }

    public function setPriceOut(?float $priceOut): self
    {
        $this->priceOut = $priceOut;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getProviderId(): ?int
    {
        return $this->providerId;
    }

    public function setProviderId(?int $providerId): self
    {
        $this->providerId = $providerId;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
