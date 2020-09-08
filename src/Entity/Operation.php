<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operation
 *
 * @ORM\Table(name="operation", indexes={@ORM\Index(name="operation_type_id", columns={"operation_type_id"}), @ORM\Index(name="product_id", columns={"product_id"}), @ORM\Index(name="sell_id", columns={"sell_id"})})
 * @ORM\Entity
 */
class Operation
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
     * @var int
     *
     * @ORM\Column(name="in_stock", type="integer", nullable=false)
     */
    private $inStock;

    /**
     * @var float
     *
     * @ORM\Column(name="q", type="float", precision=10, scale=0, nullable=false)
     */
    private $q;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price_in", type="float", precision=10, scale=0, nullable=true)
     */
    private $priceIn;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price_out", type="float", precision=10, scale=0, nullable=true)
     */
    private $priceOut;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price_inp", type="float", precision=10, scale=0, nullable=true)
     */
    private $priceInp;

    /**
     * @var int|null
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $categoryId;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"default"="1"})
     */
    private $status = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \OperationType
     *
     * @ORM\ManyToOne(targetEntity="OperationType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operation_type_id", referencedColumnName="id")
     * })
     */
    private $operationType;

    /**
     * @var \Sell
     *
     * @ORM\ManyToOne(targetEntity="Sell")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sell_id", referencedColumnName="id")
     * })
     */
    private $sell;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInStock(): ?int
    {
        return $this->inStock;
    }

    public function setInStock(int $inStock): self
    {
        $this->inStock = $inStock;

        return $this;
    }

    public function getQ(): ?float
    {
        return $this->q;
    }

    public function setQ(float $q): self
    {
        $this->q = $q;

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

    public function getPriceInp(): ?float
    {
        return $this->priceInp;
    }

    public function setPriceInp(?float $priceInp): self
    {
        $this->priceInp = $priceInp;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getOperationType(): ?OperationType
    {
        return $this->operationType;
    }

    public function setOperationType(?OperationType $operationType): self
    {
        $this->operationType = $operationType;

        return $this;
    }

    public function getSell(): ?Sell
    {
        return $this->sell;
    }

    public function setSell(?Sell $sell): self
    {
        $this->sell = $sell;

        return $this;
    }


}
