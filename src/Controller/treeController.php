<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class treeController extends BaseController
{
#[Route('/tree/{slug}', name: 'Tree')]
public function index(): Response
{

    $this->data['file'] = __DIR__.'/newtest.csv';

    return $this->baseRender('scientist/tree.html.twig', [
        'controller_name' => 'treeController',
        'data' => $this->data,
    ]);
}
}