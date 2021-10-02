<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=Inputs::class, mappedBy="product_id")
     */
    private $inputs;

    /**
     * @ORM\OneToMany(targetEntity=SaleProducts::class, mappedBy="product_id")
     */
    private $saleProducts;

    public function __construct()
    {
        $this->inputs = new ArrayCollection();
        $this->saleProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|Inputs[]
     */
    public function getInputs(): Collection
    {
        return $this->inputs;
    }

    public function addInput(Inputs $input): self
    {
        if (!$this->inputs->contains($input)) {
            $this->inputs[] = $input;
            $input->setProductId($this);
        }

        return $this;
    }

    public function removeInput(Inputs $input): self
    {
        if ($this->inputs->removeElement($input)) {
            // set the owning side to null (unless already changed)
            if ($input->getProductId() === $this) {
                $input->setProductId(null);
            }
        }

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
            $saleProduct->setProductId($this);
        }

        return $this;
    }

    public function removeSaleProduct(SaleProducts $saleProduct): self
    {
        if ($this->saleProducts->removeElement($saleProduct)) {
            // set the owning side to null (unless already changed)
            if ($saleProduct->getProductId() === $this) {
                $saleProduct->setProductId(null);
            }
        }

        return $this;
    }
}
