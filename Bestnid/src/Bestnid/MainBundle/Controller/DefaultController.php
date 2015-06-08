<?php

namespace Bestnid\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Bestnid\MainBundle\Entity\Oferta;
use Bestnid\MainBundle\Form\Type\OfertaType;
use Bestnid\MainBundle\Entity;


class DefaultController extends Controller
{
    public function portadaAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
		$todo=$em->getRepository('MainBundle:Usuario')->findAll();
		$ciudades=$em->getRepository('MainBundle:Ciudad')->findAll();

	/*return $this->render
						('MainBundle:Default:portada2.html.twig',
						array('todo'=>$todo, 'ciudades'=>$ciudades)
	);*/
        return $this->render('::base.html.twig');
	}

	public function estaticaAction()
	{
		/*return $this->render('MainBundle:Default:portada2.html.twig');*/
        $em = $this->getDoctrine()->getEntityManager();
        $categorias=$em->getRepository('MainBundle:Categoria')->findAll();
        $em2 = $this->getDoctrine();
        $productos = $em2->getRepository('MainBundle:Producto')->findActivas();
        /*$user = $this->container->get(‘security.context’)->getToken()->getUser();*/
        return $this->render('::frontend.html.twig', array('categorias'=>$categorias, "productos"=>$productos));
	}
		//return $this->render('MainBundle:Default:ayuda.html.twig');

    public function productoAction(Request $peticion, $producto_id)
    {
        $oferta = new Oferta();
        $formulario = $this->createForm(new OfertaType(), $oferta);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            /*$producto->subirFoto($this->container->getParameter('bestnid.directorio.imagenes'));*/
            $oferta = $formulario->getData();
            /*$oferta->setUsuario($this->getUser());*/

            $em = $this->getDoctrine();
            $producto = $em->getRepository('MainBundle:Producto')->findOneBy(array('id' => $producto_id));

            $oferta->setUsuario($this->getUser());
            $oferta->setProducto($producto);
            $oferta->setFecha(new \DateTime('now'));
            $oferta->setVendida("false");
            $oferta->setId();

            $em = $this->getDoctrine()->getManager();
            $em->persist($oferta);
            $em->flush();


            return $this->redirect($this->generateUrl('portada'));
        }


        $em = $this->getDoctrine();
        $categorias=$em->getRepository('MainBundle:Categoria')->findAll();
        $em = $this->getDoctrine();
        $producto = $em->getRepository('MainBundle:Producto')->findOneBy(array('id' => $producto_id));
        return $this->render('::producto.html.twig', array('categorias'=>$categorias, "producto"=>$producto, 'formulario' => $formulario->createView()));

    }

    public function categoriaAction($categoria)
    {
        /*return $this->render('MainBundle:Default:portada2.html.twig');*/
        $em = $this->getDoctrine()->getEntityManager();
        $categorias=$em->getRepository('MainBundle:Categoria')->findAll();
        $em2 = $this->getDoctrine();


       /* $productos = $em2->getRepository('MainBundle:Producto')->findActivasByCategoria($categoria);*/

        $productos = $em2->getRepository('MainBundle:Producto')->findByCategoria($categoria);

        /*$user = $this->container->get(‘security.context’)->getToken()->getUser();*/
        return $this->render('::frontend.html.twig', array('categorias'=>$categorias, "productos"=>$productos));
    }


}

