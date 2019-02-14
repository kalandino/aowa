<?php

declare(strict_types = 1);

namespace Service\Order;

use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\User\ISecurity;
use Model\Entity\Product;

class BasketBuilder
{
    /**
     * @var Product[]
     */
    private $products;
    /**
     * @var IBilling
     */
    private $billing;

    /**
     * @var IDiscount
     */
    private $discount;

    /**
     * @var ICommunication
     */
    private $communication;

    /**
     * @var ISecurity
     */
    private $security;

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[]
     *
     * @return BasketBuilder
     */
    public function setProducts(array $products): BasketBuilder
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return IBilling
     */
    public function getBilling(): IBilling
    {
        return $this->billing;
    }

    /**
     * @param IBilling
     *
     * @return BasketBuilder
     */
    public function setBilling(IBilling $billing): BasketBuilder
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @return IDiscount
     */
    public function getDiscount(): IDiscount
    {
        return $this->discount;
    }

    /**
     * @param IDiscount
     *
     * @return BasketBuilder
     */
    public function setDiscount(IDiscount $discount): BasketBuilder
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return ICommunication
     */
    public function getCommunication(): ICommunication
    {
        return $this->communication;
    }

    /**
     * @param ICommunication
     *
     * @return BasketBuilder
     */
    public function setCommunication(ICommunication $communication): BasketBuilder
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @return ISecurity
     */
    public function getSecurity(): ISecurity
    {
        return $this->security;
    }

    /**
     * @param ISecurity $security
     *
     * @return BasketBuilder
     */
    public function setSecurity(ISecurity $security): BasketBuilder
    {
        $this->security = $security;
        return $this;
    }

    /**
     * @return Checkout
     */
    public function build(): Checkout
    {
        return new Checkout($this);
    }
}

