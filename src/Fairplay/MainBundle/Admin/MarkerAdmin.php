<?php
/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 2/17/14
 * Time: 7:24 PM
 */

namespace Fairplay\MainBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

class MarkerAdmin  extends Admin{

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('longitude')
                    ->add('latitude');
    }
} 