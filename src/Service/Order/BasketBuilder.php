<?php
/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 23.02.2020
 * Time: 11:47
 */

namespace Service\Order;

use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;
use Model\Entity\Product;

class BasketBuilder
{
    /**
     * @var BillingInterface
     */
    private $billing;
    /**
     * @var DiscountInterface
     */
    private $discount;
    /**
     * @var CommunicationInterface
     */
    private $communication;
    /**
     * @var SecurityInterface
     */
    private $security;
    /**
     * @var Product[]
     */
    private $products;

    public function getBilling(): BillingInterface
    {
        return $this->billing;
    }

    public function setBilling(BillingInterface $billing): BasketBuilder
    {
        $this->billing = $billing;
        return $this;
    }

    public function getDiscount(): DiscountInterface
    {
        return $this->discount;
    }

    public function setDiscount(DiscountInterface $discount): BasketBuilder
    {
        $this->discount = $discount;
        return $this;
    }

    public function getCommunication(): CommunicationInterface
    {
        return $this->communication;
    }

    public function setCommunication(CommunicationInterface $communication): BasketBuilder
    {
        $this->communication = $communication;
        return $this;
    }

    public function getSecurity(): SecurityInterface
    {
        return $this->security;
    }

    public function setSecurity(SecurityInterface $security): BasketBuilder
    {
        $this->security = $security;
        return $this;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): BasketBuilder
    {
        $this->products = $products;
        return $this;
    }

    public function build(): Checkout
    {
        return new Checkout($this);
    }
}