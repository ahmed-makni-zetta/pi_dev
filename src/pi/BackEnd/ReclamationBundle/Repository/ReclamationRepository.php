<?php

namespace pi\BackEnd\ReclamationBundle\Repository;

/**
 * ReclamationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReclamationRepository extends \Doctrine\ORM\EntityRepository
{
    public function ReclamationAdoptionDQL()
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT e FROM ReclamationBundle:Reclamation e WHERE e.idAdoption > 0 ");
        return $query->getResult();

    }
    public function ReclamationOffrePetiteurDQL()
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT e FROM ReclamationBundle:Reclamation e WHERE e.idOffre > 0 ");
        return $query->getResult();

    }
}
