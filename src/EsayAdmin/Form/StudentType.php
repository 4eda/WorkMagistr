<?php

namespace App\EsayAdmin\Form;

//use App\Entity\Students;
use App\Entity\Scientist;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'student',
                EntityType::class,
                [
                    'label' => 'Выбрать ученного',
                    'class' => Scientist::class,
                    'empty_data' => '',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->Where('p.active = true');
                    },
                    'required' => true,
                    'multiple' => false,
                ]
            )
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Students::class,
        ]);
    }
}