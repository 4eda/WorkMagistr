<?php

namespace App\EsayAdmin\Form;

use App\Entity\SubItemMenu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubItemMenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'action',
                CheckboxType::class, [
                        'label' => 'Активность',
                    ]
            )
            ->add(
                'item_name',
                TextType::class, [
                        'label' => 'Название пункта меню',
                    ]
            )
            ->add(
                'item_link',
                TextType::class, [
                        'label' => 'Ссылка',
                    ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SubItemMenu::class,
        ]);
    }
}
