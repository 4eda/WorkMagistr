<?php

namespace App\Controller;

use App\Entity\Scientist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScientistController extends BaseController
{
    #[Route('/scientist/{slug}', name: 'scientist')]
    public function index(int|string $slug): Response
    {
        if (is_numeric($slug))
        {
            $this->data['scientist'] =  (array) $this->doctrine->
            getRepository(Scientist::class)->getScientist($slug);
        }

        return $this->baseRender('scientist/index.html.twig', [
            'controller_name' => 'ScientistController',
            'data' => $this->data,
        ]);
    }
}
