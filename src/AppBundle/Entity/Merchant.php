<?php

namespace AppBundle\Entity;

use Assert\Assertion;
use Doctrine\Common\Collections\Collection;

class Merchant
{
    /** @var integer */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $address;

    /** @var Collection */
    private $products;

    public function __construct($name, $address)
    {
        $this->setName($name);
        $this->setAddress($address);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        Assertion::notNull($name);
        Assertion::string($name);

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        Assertion::notNull($address);
        Assertion::string($address);

        $this->address = $address;
    }

    /**
     * @return Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Collection $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }


}
