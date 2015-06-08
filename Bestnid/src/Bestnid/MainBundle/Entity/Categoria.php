<?php
namespace Bestnid\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
 
class Categoria
{
		/** 
		 * @ORM\Id
		 * @ORM\Column(type="integer")
		 * @ORM\GeneratedValue(strategy="AUTO")
		 */
		protected $id;
		
		/** @ORM\Column(type="string")*/ 
		protected $nombre;
		/** @ORM\OneToMany(targetEntity="Bestnid\MainBundle\Entity\Producto", mappedBy = "categoria") */ 
		protected $productos;
		
		
		
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Categoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add productos
     *
     * @param \Bestnid\MainBundle\Entity\Producto $productos
     * @return Categoria
     */
    public function addProducto(\Bestnid\MainBundle\Entity\Producto $productos)
    {
        $this->productos[] = $productos;
    
        return $this;
    }

    /**
     * Remove productos
     *
     * @param \Bestnid\MainBundle\Entity\Producto $productos
     */
    public function removeProducto(\Bestnid\MainBundle\Entity\Producto $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}