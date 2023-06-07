<?php

namespace App\Controller\Admin;

use App\Entity\ScientistDirt;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ScientistDirtCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ScientistDirt::class;
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
