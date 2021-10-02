<?php

namespace App\Entity;

use App\Repository\SalesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalesRepository::class)
 */
class Sales
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $total_value;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="sales")
     */
    private $user_id;

    /**
     * @ORM\OneToMany(targetEntity=SaleProducts::class, mappedBy="sale_id")
     */
    private $saleProducts;

    public function __construct()
    {
        $this->saleProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    public function setUserId(?Users $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection|SaleProducts[]
     */
    public function getSaleProducts(): Collection
    {
        return $this->saleProducts;
    }

    public function addSaleProduct(SaleProducts $saleProduct): self
    {
        if (!$this->saleProducts->contains($saleProduct)) {
            $this->saleProducts[] = $saleProduct;
            $saleProduct->setSaleId($this);
        }

        return $this;
    }

    public function removeSaleProduct(SaleProducts $saleProduct): self
    {
        if ($this->saleProducts->removeElement($saleProduct)) {
            // set the owning side to null (unless already changed)
            if ($saleProduct->getSaleId() === $this) {
                $saleProduct->setSaleId(null);
            }
        }

        return $this;
    }
}
