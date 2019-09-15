<?php

namespace App\Form;

use App\Entity\Pet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuiller indiquer le nom de votre animal',
                    ])
            ]
            ])
            ->add('birthday', BirthdayType::class, [
                'widget' => 'single_text',
                'label' => 'Date de naissance',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuiller indiquer la date de naissance de votre animal',
                    ])
            ]
            ])
            ->add('adopt_date', BirthdayType::class, [
                'label' => 'Date d\'adoption',
                'widget' => 'single_text',
            ])
            ->add('number_puce', IntegerType::class, [
                'label' => 'Identification',
                'required' => false,
            ])
            //->add('created_at')
            //->add('updated_at')
            ->add('sterilisy', null, [
                'label' => 'Cocher si votre animal est strérilisé'
            ])
            //->add('user')
            ->add('type', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuiller indiquer le type de l\'animal',
                    ])
            ]
            ])
            ->add('sexe', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuiller indiquer le sexe de votre animal',
                    ])
            ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
        ]);
    }
}
