<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function createEntity(string $entityFqcn)
    {
        $comment = new Comment();
        $comment->setUser($this->getUser());

        return $comment;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('post'),
            AssociationField::new('user')->hideOnForm(),
            TextField::new('content'),
            DateTimeField::new('createdAt')->hideOnForm(),            
        ];
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
