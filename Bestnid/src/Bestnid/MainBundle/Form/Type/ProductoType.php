<?php
// src/Cupon/OfertaBundle/Form/Extranet/OfertaType.php
namespace Bestnid\MainBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('foto', 'file', array('required' => true))
            ->add("categoria")
            ->add('f_ini',"datetime")
            ->add('f_fin', "datetime")
            ->add('aceptar', 'submit', array(
                'label' => 'Guardar cambios',
                'attr'  => array('class' => 'boton')
            ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bestnid\MainBundle\Entity\Producto'
        ));
    }
    public function getName()
    {
        return 'producto_usuario';
    }
}