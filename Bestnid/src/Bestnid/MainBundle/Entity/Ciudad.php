<?php
namespace Bestnid\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
 
class Ciudad
{
		/** 
		 * @ORM\Id
		 * @ORM\Column(type="integer")
		 * @ORM\GeneratedValue(strategy="AUTO")
		 */
		protected $id;


		/** @ORM\Column(type="string", length=100)*/ 
		protected $nombre;


		/** @ORM\Column(type="string", length=100)*/ 
		protected $slug;


		/** @ORM\OneToMany(targetEntity="Bestnid\UserBundle\Entity\User", mappedBy="ciudad")
		**/
		protected $usuarios;
		
		
		
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */

    public function __toString()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param \string, length=100 $nombre
     * @return Ciudad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return \string, length=100 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set slug
     *
     * @param \string, length=100 $slug
     * @return Ciudad
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return \string, length=100 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add usuarios
     *
     * @param \Bestnid\UserBundle\Entity\User $usuarios
     * @return Ciudad
     */
    public function addUsuario(\Bestnid\UserBundle\Entity\User $usuarios)
    {
        $this->usuarios[] = $usuarios;
    
        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \Bestnid\UserBundle\Entity\User $usuarios
     */
    public function removeUsuario(\Bestnid\UserBundle\Entity\User $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}