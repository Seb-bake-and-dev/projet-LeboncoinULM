<?php

namespace App\Form;

use App\Entity\Announce;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AnnounceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type')
            ->add('state')
            ->add('imageFile', FileType::class, array('label'=> 'Ajouter une image', 'required' => false))
            ->add('Marque')
            ->add('Model')
            ->add('Description')
            ->add('date_post', DateType::class, [
                'required' => true,
                'label' => 'Début des travaux',
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('Price');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Announce::class,
        ]);
    }
}
