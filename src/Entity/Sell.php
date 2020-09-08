<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sell
 *
 * @ORM\Table(name="sell", indexes={@ORM\Index(name="operation_type_id", columns={"operation_type_id"}), @ORM\Index(name="person_id", columns={"person_id"}), @ORM\Index(name="sell_ibfk_77", columns={"payment_method"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class Sell
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
     * @var int|null
     *
     * @ORM\Column(name="ref_id", type="integer", nullable=true)
     */
    private $refId;

    /**
     * @var string
     *
     * @ORM\Column(name="delivered_by", type="string", length=60, nullable=false, options={"default"="NN"})
     */
    private $deliveredBy = 'NN';

    /**
     * @var string
     *
     * @ORM\Column(name="invoice", type="string", length=120, nullable=false, options={"default"="Ninguna Asociada"})
     */
    private $invoice = 'Ninguna Asociada';

    /**
     * @var int|null
     *
     * @ORM\Column(name="payment_type", type="integer", nullable=true, options={"default"="2"})
     */
    private $paymentType = '2';

    /**
     * @var float|null
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cash", type="float", precision=10, scale=0, nullable=true)
     */
    private $cash;

    /**
     * @var float|null
     *
     * @ORM\Column(name="iva", type="float", precision=10, scale=0, nullable=true)
     */
    private $iva;

    /**
     * @var float|null
     *
     * @ORM\Column(name="discount", type="float", precision=10, scale=0, nullable=true)
     */
    private $discount;

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
     * @var \OperationType
     *
     * @ORM\ManyToOne(targetEntity="OperationType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operation_type_id", referencedColumnName="id")
     * })
     */
    private $operationType;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     * })
     */
    private $person;

    /**
     * @var \Paymethod
     *
     * @ORM\ManyToOne(targetEntity="Paymethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payment_method", referencedColumnName="id")
     * })
     */
    private $paymentMethod;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefId(): ?int
    {
        return $this->refId;
    }

    public function setRefId(?int $refId): self
    {
        $this->refId = $refId;

        return $this;
    }

    public function getDeliveredBy(): ?string
    {
        return $this->deliveredBy;
    }

    public function setDeliveredBy(string $deliveredBy): self
    {
        $this->deliveredBy = $deliveredBy;

        return $this;
    }

    public function getInvoice(): ?string
    {
        return $this->invoice;
    }

    public function setInvoice(string $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getPaymentType(): ?int
    {
        return $this->paymentType;
    }

    public function setPaymentType(?int $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getCash(): ?float
    {
        return $this->cash;
    }

    public function setCash(?float $cash): self
    {
        $this->cash = $cash;

        return $this;
    }

    public function getIva(): ?float
    {
        return $this->iva;
    }

    public function setIva(?float $iva): self
    {
        $this->iva = $iva;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

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

    public function getOperationType(): ?OperationType
    {
        return $this->operationType;
    }

    public function setOperationType(?OperationType $operationType): self
    {
        $this->operationType = $operationType;

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

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getPaymentMethod(): ?Paymethod
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?Paymethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }


}
