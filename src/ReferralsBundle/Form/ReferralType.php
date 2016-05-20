<?php

namespace ReferralsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReferralType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('firstName')
            ->add('surname')
            ->add('dateOfBirth')
            ->add('email')
            ->add('mobilePhone')
            ->add('address1')
            ->add('address2')
            ->add('address3')
            ->add('postcode')
            ->add('status')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ReferralsBundle\Entity\Referral'
        ));
    }
}
