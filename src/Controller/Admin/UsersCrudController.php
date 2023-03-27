<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_EDIT, 'Редактировать пользователя')
            ->setPageTitle(Crud::PAGE_INDEX, 'Список пользователей');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('username', 'Имя пользователя'),
            ChoiceField::new('roles', 'Привилегии')
                ->allowMultipleChoices()
                ->autocomplete()
                ->setChoices(
                    [
                        'Разрешен вход в систему администрирования' => 'ROLE_ADMIN',
                        'Доступ ко всем функциям' => 'ROLE_SUPERADMIN',
                        'Обычный пользователь' => 'ROLE_USER',
                        'SEO оптимизатор' => 'ROLE_SEO',
                        'Контент менеджер' => 'ROLE_CONTENT',
                    ]
                ),
            EmailField::new('email', 'Адрес электронной почты')->hideOnIndex(),
            TextField::new('password', 'Пароль')
                ->hideOnIndex()
                ->setHelp('Для смены пароля либо оставьте пустым'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->set(Crud::PAGE_INDEX, Action::DELETE)
            ->set(Crud::PAGE_INDEX, Action::EDIT)
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel('Удалить');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil-square-o')->setLabel('Редактировать');
            })
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-user-plus')->setLabel('Добавить пользователя');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить и продолжить редактирование');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить и добавить еще одного пользователя');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения');
            });
    }
}
