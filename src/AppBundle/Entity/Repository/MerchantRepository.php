<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Merchant;

interface MerchantRepository
{
    /**
     * @param string $address
     * @return Merchant
     */
    public function findByAddress($address);

    /**
     * @param Merchant $merchant
     */
    public function save(Merchant $merchant);
}