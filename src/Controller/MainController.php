<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends BaseController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $this->data['info'] = '1';

        return $this->baseRender(
            'base.html.twig',
            [
                'controller' => 'main',
                'data' => $this->data,
            ]
        );
    }
}
