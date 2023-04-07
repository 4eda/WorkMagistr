<?php

declare(strict_types=1);

namespace App\Easyadmin\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

/**
 * Class CKEditorField.
 */
final class CKEditorField implements FieldInterface
{
    use FieldTrait;

    /**
     * @return static
     */
    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setTemplatePath('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ->setFormType(CKEditorType::class);
    }
}
