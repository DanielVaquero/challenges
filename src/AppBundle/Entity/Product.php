<?php

namespace AppBundle\Entity;

use Assert\Assertion;
use DateTimeInterface;

class Product
{
    const STATUS_AVAILABLE = 'available';

    /** @var integer */
    // Attribute $id not have a setter method because it's needed only for the infrastructure
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var float */
    private $price;

    /** @var \DateTimeInterface */
    private $initDate;

    /** @var \DateTimeInterface */
    private $expiryDate;

    /** @var string */
    private $status;

    /** @var integer */
    private $merchantId;

    /** @var Merchant */
    private $merchant;

    public function __construct(
        $title,
        $description,
        $price,
        \DateTime $initDate,
        \DateTime $expiryDate,
        $status,
        Merchant $merchant
    ) {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setInitDate($initDate);
        $this->setExpiryDate($expiryDate);
        $this->setStatus($status);
        $this->setMerchant($merchant);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        Assertion::notNull($title);
        Assertion::string($title);

        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::string($description);

        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        Assertion::notNull($price);
        Assertion::numeric($price);

        $this->price = $price;
    }

    /**
     * @return DateTimeInterface
     */
    public function getInitDate()
    {
        return $this->initDate;
    }

    /**
     * @param DateTimeInterface $initDate
     */
    public function setInitDate($initDate)
    {
        Assertion::notNull($initDate);
        Assertion::isInstanceOf($initDate, \DateTime::class);

        $this->initDate = $initDate;
    }

    /**
     * @return DateTimeInterface
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @param DateTimeInterface $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        Assertion::notNull($expiryDate);
        Assertion::isInstanceOf($expiryDate, \DateTime::class);

        $this->expiryDate = $expiryDate;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @return Merchant
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param Merchant $merchant
     */
    public function setMerchant($merchant)
    {
        Assertion::notNull($merchant);
        Assertion::isInstanceOf($merchant, Merchant::class);

        $this->merchant   = $merchant;
        $this->merchantId = $merchant->getId();
    }
}
