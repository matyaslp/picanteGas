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
use Bestnid\MainBundle\Form\Type\OfertaType;
//use Cupon\TiendaBundle\Form\Extranet\TiendaType;

class OfertaController extends Controller
{

    public function ofertaNuevaAction(Request $peticion)
    {
        $oferta = new Oferta();
        $formulario = $this->createForm(new OfertaType(), $oferta, array('ingreso' => true));
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            /*$producto->setNombre();
            $producto->setDescripcion();
            $producto->setFFin();
            $producto->subirFoto($this->container->getParameter('bestnid.directorio.imagenes'));*/


            $producto = $formulario->getData();
            $producto->setUsuario($this->getUser());
            $producto->addOferta($oferta);
            $oferta->setProducto($producto);
            $oferta->setUsuario($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($oferta);
            $em->flush();
            /*$produ = $this->getDoctrine()->getManager()->getRepository('MainBundle:Producto')->findLast();
            $this->getUser()->addProducto($produ);*/

            return $this->redirect($this->generateUrl('portada'));
        }

        return $this->render('MainBundle:Oferta:formulario.html.twig', array(
            'formulario' => $formulario->createView(), 'accion' => 'crear'

        ));
    }
}

    /**
     * Muestra el formulario para editar una oferta y se encarga del
     * procesamiento de la información recibida y la modificación de los
     * datos de las entidades de tipo Oferta
     *
     * @param string $id El id de la productor a modificar
     */
   /* public function ofertaEditarAction(Request $peticion, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $oferta = $em->getRepository('MainBundle:producto')->find($id);

        if (!$oferta) {
            throw $this->createNotFoundException('La oferta indicada no está disponible');
        }

        // Comprobar que el usuario tiene permiso para editar esta oferta concreta
        if (false === $this->get('security.context')->isGranted('ROLE_EDITAR_OFERTA', $oferta)) {
            throw new AccessDeniedException();
        }

        // Una oferta sólo se puede modificar si todavía no ha sido revisada por los administradores
        if ($oferta->getRevisada()) {
            $this->get('session')->getFlashBag()->add('error',
                'La oferta indicada no se puede modificar porque ya ha sido revisada por los administradores'
            );

            return $this->redirect($this->generateUrl('extranet_portada'));
        }

        $formulario = $this->createForm(new OfertaType(), $oferta);

        // Guardar la ruta de la foto original de la oferta
        $rutaFotoOriginal = $formulario->getData()->getRutaFoto();

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            // Si el usuario no ha modificado la foto, su valor actual es null
            if (null == $oferta->getFoto()) {
                // Guardar la ruta original de la foto en la oferta y no hacer nada más
                $oferta->setRutaFoto($rutaFotoOriginal);
            } // El usuario ha cambiado la foto
            else {
                // Copiar la foto subida y guardar la nueva ruta
                $oferta->subirFoto($this->container->getParameter('cupon.directorio.imagenes'));

                // Borrar la foto anterior
                if (!empty($rutaFotoOriginal)) {
                    $fs = new Filesystem();
                    $fs->remove($this->container->getParameter('cupon.directorio.imagenes') . $rutaFotoOriginal);
                }
            }

            $em->persist($oferta);
            $em->flush();

            return $this->redirect($this->generateUrl('extranet_portada'));
        }

        return $this->render('MainBundle:Extranet:formulario.html.twig', array(
            'accion' => 'editar',
            'oferta' => $oferta,
            'formulario' => $formulario->createView()
        ));
    }*/

    /**
     * Muestra el formulario para editar los datos del perfil de la tienda que está
     * logueada en la aplicación. También se encarga de procesar la información y
     * guardar las modificaciones en la base de datos
     */
    /*public function perfilAction(Request $peticion)
    {
        $em = $this->getDoctrine()->getManager();

        $tienda = $this->get('security.context')->getToken()->getUser();
        $formulario = $this->createForm(new TiendaType(), $tienda);

        $passwordOriginal = $formulario->getData()->getPassword();

        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            // Si el usuario no ha cambiado el password, su valor es null después de
            // hacer el ->bindRequest(), por lo que hay que recuperar el valor original
            if (null == $tienda->getPassword()) {
                $tienda->setPassword($passwordOriginal);
            }
            // Si el usuario ha cambiado su password, hay que codificarlo antes de guardarlo
            else {
                $encoder = $this->get('security.encoder_factory')->getEncoder($tienda);
                $passwordCodificado = $encoder->encodePassword(
                    $tienda->getPassword(),
                    $tienda->getSalt()
                );
                $tienda->setPassword($passwordCodificado);
            }

            $em->persist($tienda);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info',
                'Los datos de tu perfil se han actualizado correctamente'
            );

            return $this->redirect($this->generateUrl('extranet_portada'));
        }

        return $this->render('TiendaBundle:Extranet:perfil.html.twig', array(
            'tienda'     => $tienda,
            'formulario' => $formulario->createView()
        ));
    }
}*/
