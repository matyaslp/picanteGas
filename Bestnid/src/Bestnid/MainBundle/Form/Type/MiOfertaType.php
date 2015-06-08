<?php
// src/Cupon/OfertaBundle/Form/Extranet/OfertaType.php
namespace Bestnid\MainBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class MiOfertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ganadora', "radio")
            ->add('aceptar', 'submit', array(
                'label' => 'Elegir',
                'attr'  => array('class' => 'boton')
            ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bestnid\MainBundle\Entity\Oferta'
        ));
    }
    public function getName()
    {
        return 'oferta_usuario';
    }
}