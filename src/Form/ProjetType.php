<?php

namespace App\Form;

use App\Entity\Projet;
use App\Entity\Techno;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
            ->add('imageFileProjet', VichImageType::class, [
                'label' => 'Image de présentation',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('alt', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'row_attr' => [
                    'class' => 'grid',
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
                'row_attr' => [
                    'class' => 'grid',
                ],
                'required' => true,
            ])
            ->add('lien_github', UrlType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'row_attr' => [
                    'class' => 'grid',
                ],
                'required' => true,
            ])
            ->add('imageFileProjetApercu', VichFileType::class, [
                'label' => 'Aperçu du projet',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('techno_id', EntityType::class, [
                'class' => Techno::class,
                'choice_label' => 'id',
                'row_attr' => [
                    'class' => 'grid',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn',
                ],
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
            'data_class' => Projet::class,
        ]);
    }
}
