<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('el1', TextType::class)
            ->add('Nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Raison_sociale', TextType::class)
            ->add('SIRET', TelType::class)
            ->add('Adresse', TextareaType::class)
            ->add('siteweb', TextType::class)
            ->add('dossierdecandidature', TextType::class)
            ->add('element1',TextareaType::class, array(
                'label' => 'Comment une personne doit faire pour s’inscrire à une formation chez vous? '
            ))

            ->add('element2',TextareaType::class, array(
                'label' => 'Questionnaire Evaluation '
            )
        )
        ->add('element3',TextareaType::class, array(
            'label' => 'Expliquer votre protocole d’objectifs évaluables'
        )
    )
    ->add('element4',TextareaType::class, array(
        'label' => 'Déroulé de votre journée de formation'
    )
)

->add('element5',TextareaType::class, array(
    'label' => 'Test du niveau Entrée'
)
)

->add('element6',TextareaType::class, array(
    'label' => 'Expliquez nous comment vous adaptez la formation à vos bénéficiaires (situation de handicap, groupe de niveau, autre…)'
)
)

->add('element7',TextareaType::class, array(
    'label' => 'Expliquez nous votre processus après la formation'
)
)

->add('element8',TextareaType::class, array(
    'label' => 'Expliquez nous votre processus après la formation'
)
)

->add('element9',TextareaType::class, array(
    'label' => 'Expliquez nous les mesures que vous avez mis en place pour éviter les abandons ou le décrochage'
)
)

->add('element9',TextareaType::class, array(
    'label' => 'Liste des moyens techniques'
)
)

->add('element10',TextareaType::class, array(
    'label' => 'Comment vos coordonnez vos acteurs ?'
)
)

->add('element10',TextareaType::class, array(
    'label' => 'Liste des supports pédagogiques'
)
)

->add('element11',TextareaType::class, array(
    'label' => 'Plan de formation continue n-1 + année en cours + n+1'
)
)

->add('element12',TextareaType::class, array(
    'label' => 'Qu’est-ce que vous avez mis / compte mettre en place pour les PSH ?'
)
)

->add('element13',TextareaType::class, array(
    'label' => 'Recueil, analyse et traitement des appréciations des parties prenantes'
)
)

->add('element14',TextareaType::class, array(
    'label' => 'Expliquez-nous les choses mis en place dans votre organisme de formation en vue de l’amélioration continue'
)
)

->add('Submit',SubmitType::class)







        ;
            
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
