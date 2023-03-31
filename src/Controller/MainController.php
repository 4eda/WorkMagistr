<?php

namespace App\Controller;

use App\Entity\Scientist;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends BaseController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $this->data['info'] = '1';

        $this->data['Scientist'] = $this->getScientist();

        return $this->baseRender(
            'base.html.twig',
            [
                'controller' => 'main',
                'data' => $this->data,
            ]
        );
    }

    public function getScientist()
    {
        return $this->doctrine->getRepository(Scientist::class)
            ->getActiveScientist();
    }
}
