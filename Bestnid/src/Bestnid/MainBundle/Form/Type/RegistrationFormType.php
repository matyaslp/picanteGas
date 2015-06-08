<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bestnid\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class RegistrationFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder->add("nombre");
        /*$builder->add("apellido");*/

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bestnid\UserBundle\\Entity\User'
        ));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'bestnid_user_registration';
    }
}
