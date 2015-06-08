<?php
namespace Bestnid\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ofertas")
 */
 
class Oferta
{

        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
        */
        protected $id;

        /**
        * @ORM\Column(type="date")*/
        protected $fecha;

        /**
         * @ORM\ManyToOne(targetEntity="\Bestnid\MainBundle\Entity\Producto", inversedBy="ofertas") */
        protected $producto;

         /** @ORM\ManyToOne(targetEntity="\Bestnid\UserBundle\Entity\User", inversedBy="ofertas") */
        protected $usuario;
		
		/** @ORM\Column(type="string", nullable=false)*/
		protected $motivo;

        /** @ORM\Column(type="string", nullable=true)*/
        protected $respuesta;

		/** @ORM\Column(type="float")*/ 
		protected $monto;

        /** @ORM\Column(type="boolean")*/
		protected $vendida;

        /** @ORM\Column(type="boolean", nullable=true)*/
        protected $ganadora;







    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Oferta
     */
    public function setId()
    {
        $fecha= $this->getFecha();

        $this->id = $fecha->getTimestamp() + $this->getUsuario()->getId();

        return $this;
    }

    public function __toString()
    {
        return $this->producto->getNombre();
    }
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
     * Set motivo
     *
     * @param string $motivo
     * @return Oferta
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    
        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set monto
     *
     * @param float $monto
     * @return Oferta
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    
        return $this;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set vendida
     *
     * @param boolean $vendida
     * @return Oferta
     */
    public function setVendida($vendida)
    {
        $this->vendida = $vendida;
    
        return $this;
    }

    /**
     * Get vendida
     *
     * @return boolean 
     */
    public function getVendida()
    {
        return $this->vendida;
    }

 


    public function setUsuario(\Bestnid\UserBundle\Entity\User $usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setProducto(\Bestnid\MainBundle\Entity\Producto $producto)
    {
        $this->producto = $producto;

        return $this;
    }

    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set ganadora
     *
     * @param boolean $ganadora
     * @return Oferta
     */
    public function setGanadora($ganadora)
    {
        $this->ganadora = $ganadora;

        return $this;
    }

    /**
     * Get ganadora
     *
     * @return boolean
     */
    public function getGanadora()
    {
        return $this->ganadora;
    }
}