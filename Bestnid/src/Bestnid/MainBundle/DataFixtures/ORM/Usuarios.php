<?php
namespace Bestnid\MainBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bestnid\MainBundle\Entity\Usuario;

class Usuarios implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$usuarios = array(
		array('nombre' => 'tito', 'apellido' => 'puente', 'mail' => 'tito@gmail.com', 'dni' => '31073641', 'tarjeta' => '23332', 'f_nac' => 'date("Y/m/d", 02/09/1984)', 'f_alta' => 'date("Y/m/d", 02/02/2014)', 'pass' => 'titopass', 'estado' => 'True', 'tipo'=>'reg'),
		array('nombre' => 'lau', 'apellido' => 'ba', 'mail' => 'lau@gmail.com', 'dni' => '32654897', 'tarjeta' => '54587', 'f_nac' => 'date("Y/m/d", 01/10/1985)', 'f_alta' => 'date("Y/m/d", 20/02/2014)', 'pass' => 'laupass', 'estado' => 'True', 'tipo'=>'reg')
	);
	
	
	foreach ($usuarios as $usuario) 
	{
		$entidad = new Usuario();
		$entidad->setNombre($usuario['nombre']);
		$entidad->setApellido($usuario['apellido']);
		$entidad->setMail($usuario['mail']);
		$entidad->setDni($usuario['dni']);
		$entidad->setTarjeta($usuario['tarjeta']);
		$entidad->setFNac($usuario['f_nac']);
		$entidad->setFAlta($usuario['f_alta']);
		$entidad->setPass($usuario['pass']);
		$entidad->setEstado($usuario['estado']);
		$entidad->setTipo($usuario['tipo']);
		//falta direccion que esta nullable
		
		$manager->persist($entidad);
	}
$manager->flush();
	}
}