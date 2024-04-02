<?php

namespace App\Form;

use App\Entity\Projet;
use App\Entity\Techno;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('image_projet', FileType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('alt', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('temps_realisation', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('lien', UrlType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('lien_github', UrlType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('image_apercu', FileType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('techno_id', EntityType::class, [
                'class' => Techno::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
