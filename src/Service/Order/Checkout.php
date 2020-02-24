<?php
/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 23.02.2020
 * Time: 14:19
 */

namespace Service\Order;

use Model\Entity\Product;
use Service\Billing\BillingInterface;
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