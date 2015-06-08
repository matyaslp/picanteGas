<?php
namespace Bestnid\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

class OfertaRepository extends EntityRepository
{
    public function buscarOferta($id)
    {
         $query = $this->getEntityManager()->createQuery(
                "SELECT o
                 FROM MainBundle:Usuario u JOIN MainBundle:Oferta o
                 WHERE o.usuario = :id"
            ) ->setParameter('id', $id);
        return $query->getResult();
    }

}