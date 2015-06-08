<?php
namespace Bestnid\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProductoRepository extends EntityRepository
{
    public function findProduByUserId($id)
    {
         $query = $this->getEntityManager()->createQuery(
                'SELECT p
                 FROM MainBundle:Producto p
                 WHERE p.usuario = :id
                 ORDER BY p.f_ini ASC'
            ) ->setParameter('id', $id);
        return $query->getResult();
    }

    public function findActivas()
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT p
                 FROM MainBundle:Producto p
                 WHERE p.f_fin > :now
                 ORDER BY p.f_ini ASC'
        ) ->setParameter('now', new \DateTime('now'));
        return $query->getResult();
    }

    public function findActivasByCategoria($categoria)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT p
                 FROM MainBundle:Producto p
                 WHERE p.categoria = :categoria'

        ) ->setParameter('categoria', $categoria);
        return $query->getResult();
    }
}