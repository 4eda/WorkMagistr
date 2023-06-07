<?php
namespace App\Controller;

use App\Entity\Scientist;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends BaseController
{
    #[Route('/search/{name}', name: 'search')]
    public function index($name, Request $request,PaginatorInterface $paginator)
    {
        if(empty($name)) return [];
        $Scientist = $this->doctrine
            ->getRepository(Scientist::class)
            ->searchScientists($name);
        $this->data['Scientist'] = $paginator->paginate(
            $Scientist,
            $request->query->getInt('page', 1), // текущая страница (по умолчанию 1)
            4 // количество элементов на странице
        );

        return $this->baseRender(
            'articles/homepage.html.twig',
            [
                'controller' => 'Search',
                'scientist' => $this->data['Scientist'],
            ]
        );
    }

}