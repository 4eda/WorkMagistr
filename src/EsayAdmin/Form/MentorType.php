<?php

namespace App\EsayAdmin\Form;

use App\Entity\Mentor;
use App\Entity\Scientist;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MentorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'Mentor',
                EntityType::class,
                [
                    'label' => 'Выбрать ученного',
                    'class' => Scientist::class,
                    'empty_data' => '',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->Where('p.active = true');
                    },
                    'multiple' => false,
                ]
            )
            ->add(
                'lastmod',
                HiddenType::class,
                [
                    'data' => date('d.m.Y H:i:s'),
                ]
            )
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mentor::class,
        ]);
    }
}