<?php

namespace App\Controller;

use App\Entity\Scientist;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends BaseController
{
    #[Route('/', name: 'index')]
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $this->data['info'] = '1';

        $Scientist = $this->getScientist();
        $this->data['Scientist'] = $paginator->paginate(
            $Scientist,
            $request->query->getInt('page', 1), // текущая страница (по умолчанию 1)
            4 // количество элементов на странице
        );

        return $this->baseRender(
            'articles/homepage.html.twig',
            [
                'controller' => 'main',
                'scientist' => $this->data['Scientist'],
            ]
        );
    }

    public function getScientist()
    {
        return $this->doctrine->getRepository(Scientist::class)
            ->getActiveScientist();
    }
}
