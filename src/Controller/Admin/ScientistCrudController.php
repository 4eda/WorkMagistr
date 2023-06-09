<?php

namespace App\Controller\Admin;

use App\Easyadmin\Field\CKEditorField;
use App\Entity\Scientist;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ScientistCrudController extends AbstractCrudController
{

    private Request $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();

    }

    public static function getEntityFqcn(): string
    {
        return Scientist::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle(Crud::PAGE_INDEX, 'Список ученых')
        ->setPageTitle(Crud::PAGE_DETAIL, 'Информация об ученом')
        ->setPageTitle(Crud::PAGE_EDIT, 'Редактирование карточки ученого')
        ->setPageTitle(Crud::PAGE_NEW, 'Добавить ученого')
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        yield BooleanField::new('active')
            ->setLabel('Показывать на сайте?');
        yield TextField::new('name')
            ->setLabel('Имя')
            ->setRequired(true);
        yield TextField::new('surname')
            ->setLabel('Фамилия')
            ->setRequired(true);
        yield TextField::new('surname_two')
            ->setLabel('Отчество');
        yield TextField::new('date_brith')
            ->setLabel('Дата рождения');
        yield TextField::new('date_death')
            ->setLabel('Дата смерти');
        yield ImageField::new('image_scientist')
            ->hideOnIndex()
            ->setLabel('Фото')
            ->setUploadDir('assets/images/scientist')
            ->setUploadedFileNamePattern(
                fn (UploadedFile $file): string => sprintf('upload_%d_%s.%s', random_int(1, 999), $file->getFilename(), $file->guessExtension()));
        yield FormField::addPanel('Выбор наставника / ученика')->collapsible();
        yield AssociationField::new('mentor', 'Наставник')
            ->hideOnIndex()
            ->setFormTypeOptions([
                'class' => Scientist::class,
                'required' => false,
            ]);
        yield AssociationField::new('student', 'Ученик')
            ->hideOnIndex()
            ->setFormTypeOptions([
                'class' => Scientist::class,
                'required' => false,
            ]);
        yield FormField::addPanel()->collapsible();
        yield ChoiceField::new('Academic_degree')
            ->setLabel('Ученная степень')
            ->hideOnIndex()
            ->setChoices(
                [
                    'Нет информации' => 'Нет информации',
                    'Кандидат наук' => 'Кандидат наук',
                    'Доктор наук' => 'Доктор наук',
                ]
            );
        yield ChoiceField::new('academic_title')
            ->setLabel('Ученное звание')
            ->hideOnIndex()
            ->setChoices(
                [
                    'Нет информации' => 'Нет информации',
                    'Доцент' => 'Доцент',
                    'Профессор' => 'Профессор',
                ]
            );

        yield CKEditorField::new('biography')
            ->setLabel('Биография')
            ->hideOnDetail()
            ->hideOnIndex();
        yield TextField::new('biography')
            ->setLabel('Биография')
            ->onlyOnDetail();

        yield TextField::new('date_start_work')
            ->setLabel('Дата начала работы')
            ->hideOnIndex();
        yield TextField::new('institut')
            ->setLabel('Места работы')
            ->hideOnIndex();
        yield TextField::new('scentis_blog')
            ->setLabel('Ссылки на научные статьи')
            ->hideOnIndex();
//        dd($this->request);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel('Удалить');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-pencil-square-o')->setLabel('Редактировать');
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setIcon('fa fa-eye')->setLabel('Посмотреть');
            })
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-user-plus')->setLabel('Добавить ученного');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить и продолжить редактирование');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить добавить еще');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения и вернуться к списку');
            });
    }

}
