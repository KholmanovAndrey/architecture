<?php
/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 23.02.2020
 * Time: 11:46
 */

namespace Service\Order;

use Model\Entity\Product;
use Service\Billing\Exception\BillingException;
use Service\Billing\BillingInterface;
use Service\Communication\Exception\CommunicationException;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class Checkout
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

    function __construct(BasketBuilder $builder)
    {
        $this->billing = $builder->getBilling();
        $this->discount = $builder->getDiscount();
        $this->communication = $builder->getCommunication();
        $this->security = $builder->getSecurity();
        $this->products = $builder->getProducts();
    }

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