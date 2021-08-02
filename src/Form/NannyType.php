<?php

namespace App\Form;

use App\Entity\Nanny;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class NannyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('age')
            ->add('email')
            ->add('password')
            ->add('adress')
            ->add('city')
            ->add('zipcode')
            ->add('region')
            ->add('email')
            ->add('password', PasswordType::class, [
                'label' => 'Mon mot de passe',
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre mot de passe',
                ],
            ])
            //->add('valid')
            ->add('category', EntityType::class, [
                //Connextion à l'entité
                'class' => Category::class,
                'label' => 'Category',
                //Choix multiple
                'multiple' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Register",
                'attr' => [
                    'class' => "btn btn-primary",
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Nanny::class,
        ]);
    }
}
