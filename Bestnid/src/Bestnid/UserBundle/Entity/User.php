<?php
// src/Bestnid/UserBundle/Entity/User.php

namespace Bestnid\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_usuario")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /** @ORM\Column(type="string", length=100)*/
    /**
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Tu nombre no puede contener un numero"
     * )
     */
    protected $nombre;



    /** @ORM\Column(type="string", length=100)*/
    /**
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Tu nombre no puede contener un numero"
     * )
     */
    protected $apellido;

    /** @ORM\Column(type="integer")*/
    protected $dni;
    /** @ORM\Column(type="integer")*/
    protected $tarjeta;
    /** @ORM\Column(type="string", nullable=true)*/
    protected $direccion;
    /** @ORM\Column(type="date")*/
    protected $f_nac;
    /** @ORM\Column(type="string", nullable=true)

    protected $f_alta;
    /** @ORM\Column(type="string", nullable=true)*/
    protected $tipo;
    /** @ORM\Column(type="boolean", nullable=true)*/
    protected $estado;

    /** @ORM\ManyToOne(targetEntity="Bestnid\MainBundle\Entity\Ciudad", inversedBy="usuarios") */
    protected $ciudad;

    /** @var ArrayCollection $productos
     * @ORM\OneToMany(targetEntity="Bestnid\MainBundle\Entity\Producto", mappedBy="usuario")
     */
    protected $productos;


    /** @var ArrayCollection $ofertas
     * @ORM\OneToMany(targetEntity="Bestnid\MainBundle\Entity\Oferta", mappedBy="usuario")
     */
    protected $ofertas;




    /**
     * Constructor
     */
    public function __construct()
    {

        parent::__construct();
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ofertas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->f_alta = new \DateTime();
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
     * @param \string, length=100 $nombre
     * @return Usuario
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
     * Set apellido
     *
     * @param \string, length=100 $apellido
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return \string, length=100
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set mail
     *
     * @param \string, length=100 $mail
     * @return Usuario
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return \string, length=100
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     * @return Usuario
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return integer
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set tarjeta
     *
     * @param integer $tarjeta
     * @return Usuario
     */
    public function setTarjeta($tarjeta)
    {
        $this->tarjeta = $tarjeta;

        return $this;
    }

    /**
     * Get tarjeta
     *
     * @return integer
     */
    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set f_nac
     *
     * @param \DateTime $fNac
     * @return Usuario
     */
    public function setFNac($fNac)
    {
        $this->f_nac = $fNac;

        return $this;
    }

    /**
     * Get f_nac
     *
     * @return \DateTime
     */
    public function getFNac()
    {
        return $this->f_nac;
    }

    /**
     * Set f_alta
     *
     * @param \DateTime $fAlta
     * @return Usuario
     */
    public function setFAlta($fAlta)
    {
        $this->f_alta = $fAlta;

        return $this;
    }

    /**
     * Get f_alta
     *
     * @return \DateTime
     */
    public function getFAlta()
    {
        return $this->f_alta;
    }



    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Usuario
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Usuario
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set ciudad
     *
     * @param \Bestnid\MainBundle\Entity\Ciudad $ciudad
     * @return Usuario
     */
    public function setCiudad(\Bestnid\MainBundle\Entity\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \Bestnid\MainBundle\Entity\Ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Add productos
     *
     * @param \Bestnid\MainBundle\Entity\Producto $productos
     * @return Usuario
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


    /**
     * Get ofertas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOfertas()
    {
        return $this->ofertas;
    }


    /**
     * Remove ofertas
     *
     * @param \Bestnid\MainBundle\Entity\Oferta $ofertas
     */

    public function removeOferta(\Bestnid\MainBundle\Entity\Oferta $ofertas)
    {
        $this->ofertas->removeElement($ofertas);
    }

    /**
     * Add oferta
     *
     * @param \Bestnid\MainBundle\Entity\Oferta $ofertas
     * @return Usuario
     */
    public function addOferta(\Bestnid\MainBundle\Entity\Oferta $ofertas)
    {
        $this->ofertas[] = $ofertas;

        return $this;
    }



}