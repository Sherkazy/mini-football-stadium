<?php

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Validator\Constraints\Collection;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True as Recaptcha;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;


class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->remove('username');
        $builder->add('recaptcha', 'ewz_recaptcha');
    }

    public function getName()
    {
        return 'fairplay_user_registration';
    }
    public function getDefaultOptions(array $options)
    {
        $collectionConstraint = new Collection(array(
            'recaptcha' => new Recaptcha(),
        ));

        return array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\User',
            'validation_constraint' => $collectionConstraint,
        );
    }

}