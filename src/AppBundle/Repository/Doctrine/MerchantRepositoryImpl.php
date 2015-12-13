<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Merchant;
use AppBundle\Entity\Repository\MerchantRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class MerchantRepositoryImpl extends EntityRepository implements MerchantRepository
{
    private $em;

    public function __construct(EntityManager $em, $entityClassName)
    {
        $this->em = $em;
        parent::__construct($em, new ClassMetadata($entityClassName));

    }

    public function findByAddress($address)
    {
        return $this->findOneBy(['address' => $address]);

    }

    /**
     * @param Merchant $merchant
     */
    public function save(Merchant $merchant)
    {
        $this->em->persist($merchant);
        $this->em->flush();
    }
}