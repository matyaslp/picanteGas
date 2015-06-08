<?php

namespace Bestnid\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class SitioController extends Controller
{
public function estaticaAction($pagina)
{
return $this->render('MainBundle:Sitio:'.$pagina.'.html.twig');
}

    public function pruebaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ofertas = $em->getRepository("MainBundle:Oferta")->findAll();

        return $this->render('::prueba.html.twig', array("ofertas"=>$ofertas));
    }
}