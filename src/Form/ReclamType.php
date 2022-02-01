<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('societe', TextType::class)
            ->add('telephone', TelType::class)
            ->add('files', Filetype::class,[
                'label'=> 'Choissisez votre fichier'
            ]
            )
            ->add('Probleme', ChoiceType::class, array(
                'required' => false,
                'label' => 'Problème : ',
                'multiple' => true,
                'expanded' => true,
                'mapped' => false,
                'choices'  => array(
                    'Connexion' => "Connexion",
                    'Incident' => "Incident",
                )
            ) 
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
