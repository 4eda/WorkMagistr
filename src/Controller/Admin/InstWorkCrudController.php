<?php

namespace App\Controller\Admin;

use App\Entity\InstWork;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InstWorkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InstWork::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
