<?php
// src/Cupon/OfertaBundle/Form/Extranet/OfertaType.php
namespace Bestnid\MainBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class OfertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options["ingreso"])
        {
          $builder
            ->add('motivo')
            ->add('monto')
            ->add('aceptar', 'submit', array(
                'label' => 'Ofertar',
                'attr'  => array('class' => 'boton')));
        } else {
            $builder
            ->add('ganadora', "radio")
            ->add('aceptar', 'submit', array(
                'label' => 'Elegir',
                'attr'  => array('class' => 'boton')));
        }
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bestnid\MainBundle\Entity\Oferta',
            "ingreso" => true
        ));
    }
    public function getName()
    {
        return 'oferta_usuario';
    }
}