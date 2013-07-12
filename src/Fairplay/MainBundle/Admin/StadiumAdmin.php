<?php
/**
 * Created by JetBrains PhpStorm.
 * User: BİLGİ İŞLEM
 * Date: 10.07.2013
 * Time: 14:10
 * To change this template use File | Settings | File Templates.
 */
namespace Fairplay\MainBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class StadiumAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name')
            ->add('description')
            ->add('district')
            ->add('address')
            ->add('gallery', 'sonata_type_model_list', array('required' => false, 'label' => 'Галерея'), array('link_parameters' => array('context' => 'default')))
            ->add('facilities','sonata_type_model',array( 'by_reference' => false,
                'multiple' => true,
                'expanded' => true,));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
            ->add('district')
            ->add('score')
            ->add('address')
            ->add('facilities','sonata_type_model',array( 'by_reference' => false,
                'multiple' => true,
                'expanded' => true,));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->add('name')
            ->add('address');
    }
}