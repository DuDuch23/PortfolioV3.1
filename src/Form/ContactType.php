<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Constant
{
    public const DEMANDEPARTENARIAT = 'Demande de partenariats';
    public const DEMANDEOFFRE = 'Demande de d\'offres';
    public const AUTRE = 'Autre..';
    public const NULL = '??';
}

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'nom',
                    'placeholder' => 'Nom',
                ],
                'label' => false,
                'required' => true,
                'row_attr' => [
                    'class' => 'form-row',
                ]
            ])
            
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'prenom',
                    'placeholder' => 'Prénom',
                ],
                'label' => false,
                'required' => true,
                'row_attr' => [
                    'class' => 'form-row',
                ]
            ])

            ->add('email', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'email',
                    'placeholder' => 'Email',
                ],
                'label' => false,
                'required' => true,
                'row_attr' => [
                    'class' => 'form-row',
                ]
            ])

            ->add('sujet', ChoiceType::class, [
                'choices' => [
                    Constant::DEMANDEPARTENARIAT => Constant::DEMANDEPARTENARIAT,
                    Constant::DEMANDEOFFRE => Constant::DEMANDEOFFRE,
                    Constant::AUTRE => Constant::AUTRE,
                    Constant::NULL => Constant::NULL,
                ],
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'sujet',
                    'placeholder' => 'Sujet',
                ],
                'required' => true,
                'row_attr' => [
                    'class' => 'form-row',
                ]
            ])

            ->add('contenu', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'contenu',
                    'placeholder' => 'Contenu',
                ],
                'label' => false,
                'required' => true,
                'row_attr' => [
                    'class' => 'form-row',
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'row_attr' => [
                    'class' => 'form-submit',
                ],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
