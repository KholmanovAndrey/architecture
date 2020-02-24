<?php

/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 23.02.2020
 * Time: 13:57
 */

namespace Facade;

use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\Order\Checkout;
use Service\User\SecurityInterface;
use Model\Entity\Product;

class CheckoutFacade
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

    function __construct(
        BillingInterface $billing,
        DiscountInterface $discount,
        CommunicationInterface $communication,
        SecurityInterface $security,
        array $products
    )
    {
        $this->billing = $billing;
        $this->discount = $discount;
        $this->communication = $communication;
        $this->security = $security;
        $this->products = $products;
    }

    public function checkout()
    {
        $checkout = new Checkout(
            $this->billing,
            $this->discount,
            $this->communication,
            $this->security,
            $this->products
        );
        $checkout->checkoutProcess();
    }
}