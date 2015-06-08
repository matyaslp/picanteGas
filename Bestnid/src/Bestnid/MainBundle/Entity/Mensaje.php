<?php
namespace Bestnid\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 
 */
 
class Mensaje
{
		/** 
		 * @ORM\Id
		 * @ORM\Column(type="integer")
		 * @ORM\GeneratedValue(strategy="AUTO")
		 */
		protected $id;
		
		
		/** 
		 * @ORM\Column(type="date")
		 */
		protected $fecha;
		
		/**

        * @ORM\Column(type="string")
		*/
		protected $oferta;
		
		/** 
		* @ORM\Column(type="date") */ 
		protected $respuesta;
		
		/** @ORM\Column(type="string")*/ 
		protected $texto;
		
		

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Mensaje
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return Mensaje
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    
        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set usuario
     *
     * @param \Bestnid\UserBundle\Entity\User $usuario
     * @return Mensaje
     */
    public function setUsuario(\Bestnid\MainBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Bestnid\UserBundle\Entity\User
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set oferta
     *
     * @param \Bestnid\MainBundle\Entity\Oferta $oferta
     * @return Mensaje
     */
    public function setOferta(\Bestnid\MainBundle\Entity\Oferta $oferta)
    {
        $this->oferta = $oferta;
    
        return $this;
    }

    /**
     * Get oferta
     *
     * @return \Bestnid\MainBundle\Entity\Oferta 
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set respuesta
     *
     * @param \Bestnid\MainBundle\Entity\Mensaje $respuesta
     * @return Mensaje
     */
    public function setRespuesta(\Bestnid\MainBundle\Entity\Mensaje $respuesta = null)
    {
        $this->respuesta = $respuesta;
    
        return $this;
    }

    /**
     * Get respuesta
     *
     * @return \Bestnid\MainBundle\Entity\Mensaje 
     */
    public function getRespuesta()
    {
        return $this->respuesta;
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
}