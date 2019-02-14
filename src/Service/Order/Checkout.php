<?php

declare(strict_types = 1);

namespace Service\Order;

class Checkout
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

    public function __construct(BasketBuilder $builder)
    {
        $this->products = $builder->getProducts();
        $this->discount = $builder->getDiscount();
        $this->billing = $builder->getBilling();
        $this->security = $builder->getSecurity();
        $this->communication = $builder->getCommunication();
    }

    /**
     * Проведение всех этапов заказа
     *
     * @return void
     */
    public function checkoutProcess(): void
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}

