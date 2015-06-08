<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Bestnid\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("nombre")
            ->add("apellido")
            ->add("direccion")
            ->add("dni")
            ->add("tarjeta")
            ->add("f_nac")
            ->add("ciudad")
            ->add("enabled", null, array('required' => false))
            ->add("locked", null, array('required' => false))
            ->add("productos")
            ->add("ofertas")
            ->add("roles")
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("nombre")
            ->add("apellido")
            ->add("direccion")
            ->add("dni")
            ->add("tarjeta")
            ->add("f_nac")
            ->add("ciudad")
            ->add("enabled")
            ->add("locked")
            ->add("productos")
            ->add("ofertas")
            ->add("roles")
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("nombre")
            ->addIdentifier("apellido")
            ->addIdentifier("direccion")
            ->addIdentifier("dni")
            ->addIdentifier("tarjeta")
            ->addIdentifier("f_nac")
            ->addIdentifier("ciudad")
            ->addIdentifier("enabled")
            ->addIdentifier("locked")
            ->addIdentifier("productos")
            ->addIdentifier("ofertas")
            ->addIdentifier("roles")
        ;
    }
}