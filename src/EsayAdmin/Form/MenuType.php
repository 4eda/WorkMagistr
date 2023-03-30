<?php

namespace App\EsayAdmin\Form;

use App\Entity\MenuOneItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
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
                'itemName',
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
            ->add(
                'MenuSubMenu',

                CollectionType::class,
                [
                    'entry_type' => SubItemMenuType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'label' => 'Подменю',
                    'attr' => ['class' => 'legend-remove'],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MenuOneItem::class,
        ]);
    }
}