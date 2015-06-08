<?php

namespace Bestnid\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Bestnid\MainBundle\Entity\Producto;
use Bestnid\MainBundle\Form\Type\ProductoType;
use Bestnid\MainBundle\Form\Type\MiOfertaType;
use Bestnid\MainBundle\Form\Type\OfertaType;
use Bestnid\MainBundle\Entity\Oferta;
//use Cupon\TiendaBundle\Form\Extranet\TiendaType;

class MyadminController extends Controller
{

    public function misrematesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $remates = $em->getRepository('MainBundle:Producto')->findByUsuario($this->getUser()->getId());

        return $this->render('::misdatos.html.twig', array('remates'=>$remates));

    }

    public function misofertasAction(Request $peticion, $producto_id)
    {
        $em = $this->getDoctrine()->getManager();
        $prod = $em->getRepository('MainBundle:Producto')->findOneBy(array('id' => $producto_id));
        $oferta = $prod->getOfertas();
        $ofertaGanadora = new Oferta();
        $form = $this->createForm(new OfertaType(), $ofertaGanadora, array('ingreso' => false));

        if ($form->isValid())
        {
            $emf=$this->getDoctrine();
            $emf->persist($ofertas);
        }

        $em = $this->getDoctrine();
        $categorias=$em->getRepository('MainBundle:Categoria')->findAll();
        $em = $this->getDoctrine();
        $producto = $em->getRepository('MainBundle:Producto')->findOneBy(array('id' => $producto_id));
        return $this->render('::misofertas.html.twig', array( "producto"=>$producto, "ofertas"=>$oferta, "form"=>$form->createView()));
    }

    public function misofertasRealizadasAction(Request $peticion)
    {


        $em = $this->getDoctrine()->getManager();
        $ofertas = $em->getRepository("MainBundle:Oferta")->findBy(array(
                    "usuario" => ($this->getUser()->getId())));



        /*findBy(array('id' => $this->getUser()->getId()));*/
        return $this->render('::misofertasRealizadas.html.twig', array("ofertas"=>$ofertas));
    }
}


