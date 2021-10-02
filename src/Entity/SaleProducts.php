<?php

namespace App\Entity;

use App\Repository\SaleProductsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaleProductsRepository::class)
 */
class SaleProducts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Sales::class, inversedBy="saleProducts")
     */
    private $sale_id;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="saleProducts")
     */
    private $product_id;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $after_amount;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $before_amount;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $unitary_value;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $total_value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaleId(): ?Sales
    {
        return $this->sale_id;
    }

    public function setSaleId(?Sales $sale_id): self
    {
        $this->sale_id = $sale_id;

        return $this;
    }

    public function getProductId(): ?Products
    {
        return $this->product_id;
    }

    public function setProductId(?Products $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getAfterAmount(): ?string
    {
        return $this->after_amount;
    }

    public function setAfterAmount(string $after_amount): self
    {
        $this->after_amount = $after_amount;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getBeforeAmount(): ?string
    {
        return $this->before_amount;
    }

    public function setBeforeAmount(string $before_amount): self
    {
        $this->before_amount = $before_amount;

        return $this;
    }

    public function getUnitaryValue(): ?string
    {
        return $this->unitary_value;
    }

    public function setUnitaryValue(string $unitary_value): self
    {
        $this->unitary_value = $unitary_value;

        return $this;
    }

    public function getTotalValue(): ?string
    {
        return $this->total_value;
    }

    public function setTotalValue(string $total_value): self
    {
        $this->total_value = $total_value;

        return $this;
    }
}
