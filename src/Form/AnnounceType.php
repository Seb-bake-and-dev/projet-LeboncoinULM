<?php

namespace App\Form;

use App\Entity\Announce;
use App\Entity\State;
use App\Entity\TypeUlm;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnounceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type', EntityType::class, [
                'label' => 'Type d\'ulm',
                'class' => TypeUlm::class,
            ])
            ->add('state', EntityType::class, [
                'label' => 'Etat de l\'ulm',
                'class' => state::class,
            ])
            ->add('Price', MoneyType::class, [
                'label' => 'Prix de vente'
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Ajouter une image',
                'required' => false,
            ])
            ->add('imageFile2', FileType::class, [
                'label' => 'Ajouter une image',
                'required' => false,
            ])
            ->add('imageFile3', FileType::class, [
                'label' => 'Ajouter une image',
                'required' => false,
            ])
            ->add('Marque', TextType::class, [
                'label' => 'Marque de l\'ulm',
                'required' => true,
            ])
            ->add('Model', TextType::class, [
                'label' => 'Modèle de l\'ulm',
                'required' => false,
            ])
            ->add('vitesseMax', IntegerType::class, [
                'label' => 'Vitesse Maxi de l\'ulm',
                'required' => false,
            ])
            ->add('nbrHvol', IntegerType::class, [
                'label' => 'Heures de vols',
                'required' => false,
            ])
            ->add('yearUlm',IntegerType::class, [
                'label' => 'Année d\'achat',
                'required' => false,
            ])
            ->add('parachute', CheckboxType::class, [
                'label' => 'Parachute',
                'required' => false,
            ])
            ->add('transponder', CheckboxType::class, [
                'label' => 'Transpondeur:',
                'required' => false,
            ])
            ->add('Description', TextareaType::class, [
                'required' => true,
                'label' => 'Description de l\'annonce',
                'attr' => ['rows' => '7', 'cols' => '6']
            ])
            ->add('Submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-primary w-50 d-flex mx-auto justify-content-center'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Announce::class,
        ]);
    }
}
