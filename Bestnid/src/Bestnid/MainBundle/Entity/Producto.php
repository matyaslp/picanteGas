<?php
namespace Bestnid\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Entity\User;

/**
 * @ORM\Entity
 */

/**
 * @ORM\Entity(repositoryClass="Bestnid\MainBundle\Entity\ProductoRepository")
 */
 
class Producto
{
		/** 
		 * @ORM\Id
		 * @ORM\Column(type="integer")
		 * @ORM\GeneratedValue(strategy="AUTO")
		 */
		protected $id;
		/** @ORM\Column(type="date")
         * @Assert\DateTime
         */
		protected $f_ini;
		/** @ORM\Column(type="date")
         * @Assert\DateTime
         */
		protected $f_fin;

        /** @ORM\Column(type="string")
         * @Assert\NotBlank()
         */
		protected $nombre;

        /** @ORM\Column(type="string")
         * @Assert\NotBlank()
         */
		protected $descripcion;


		/** @ORM\Column(type="string")
         * @Assert\Image(maxSize = "900k")
         */
		protected $foto;

        /** @ORM\ManyToOne(targetEntity="Bestnid\MainBundle\Entity\Categoria", inversedBy="productos") */
		protected $categoria;

        /** @ORM\ManyToOne(targetEntity="Bestnid\UserBundle\Entity\User", inversedBy="productos")*/
        protected $usuario;

        /** @var ArrayCollection $ofertas
         * @ORM\OneToMany(targetEntity="Bestnid\MainBundle\Entity\Oferta", mappedBy="producto")*/
        protected $ofertas;





    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
         $this->usuario = $usuario;
    }


    /**
     * Set f_ini
     *
     * @param \DateTime $fIni
     * @return Producto
     */
    public function setFIni($fIni)
    {
        $this->f_ini = $fIni;
    
        return $this;
    }

    /**
     * Get f_ini
     *
     * @return \DateTime 
     */
    public function getFIni()
    {
        return $this->f_ini;
    }


    /**
     * Set f_fin
     *
     * @param \DateTime $fFin
     * @return Producto
     */
    public function setFFin($fFin)
    {
        $this->f_fin = $fFin;
    
        return $this;
    }

    /**
     * Get f_fin
     *
     * @return \DateTime 
     */
    public function getFFin()
    {
        return $this->f_fin;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Producto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set categoria
     *
     * @param \Bestnid\MainBundle\Entity\Categoria $categoria
     * @return Producto
     */
    public function setCategoria(\Bestnid\MainBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Bestnid\MainBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function subirFoto($directorioDestino)
    {
        if (null === $this->foto) {
            return;
        }
        $nombreArchivoFoto = uniqid('bestnid-').'-foto1.jpg';
        $this->foto->move($directorioDestino, $nombreArchivoFoto);
        $this->setFoto($nombreArchivoFoto);
    }

    public function activo()
    {
        $now = new \DateTime('now');
        $fini = $this->getFFin();
        return $fini > $now;
    }

    /**
     * Get categoria
     *
     * @return \Bestnid\MainBundle\Entity\Oferta
     */
    public function getOfertas()
    {
        return $this->ofertas;
    }
}