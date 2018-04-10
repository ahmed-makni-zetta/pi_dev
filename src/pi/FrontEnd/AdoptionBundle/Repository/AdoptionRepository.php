<?php

namespace pi\FrontEnd\AdoptionBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * AdoptionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdoptionRepository extends \Doctrine\ORM\EntityRepository
{



    public function delete($id){

        return $this->createQueryBuilder('f')
            ->update('pi\FrontEnd\AdoptionBundle\Entity\Adoption','f')
            ->set('f.etatadoption',0)
            ->where('f.idAdoption = ?1')
            ->setParameter(1,$id)
            ->getQuery()
            ->execute();

    }
    public function deleteAdmin($adoption){

        $qb = $this->createQueryBuilder('adoption');
        $query = $qb->delete('AdoptionBundle:Adoption', 'adoption')
            ->where('adoption.idAdoption = :Id')
            ->setParameter('Id', $adoption->getIdAdoption())
            ->getQuery();

        $query->execute();
    }

            public function findByPage($page = 1, $max = 10)
            {

$dql = $this->createQueryBuilder('pi\FrontEnd\AdoptionBundle\Entity\Adoption');

        $firstResult = ($page - 1) * $max;

        $query = $dql->getQuery();
        $query->setFirstResult($firstResult);
        $query->setMaxResults($max);

        $paginator = new Paginator($query);

        if(($paginator->count() <=  $firstResult) && $page != 1) {
            throw new NotFoundHttpException('Page not found');
        }

        return $paginator;
    }
}
