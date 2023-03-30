<?php

namespace App\Controller;

use App\Entity\Menu;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController
{
    public function __construct( protected ManagerRegistry $doctrine)
    {

    }

    public function baseRender($template = '', $data_param = []): Response
    {
        $this->getBase();
        $data['data'] = $this->data;
        foreach ($data_param as $k => $v) {
            if ('data' != $k) {
                $k = 'controller_name' === $k ? 'controller' : $k;
                $data[$k] = $v;
            }
        }
        return $this->render($template, $data, $data_param['response'] ?? null);
    }

    /**
     * Базовые данные для всех страниц.
     */
    public function getBase(): void
    {
        $this->data['root_menu'] = $this->menuGeneration(2);
    }

    private function menuGeneration($id_menu)
    {
        return  $this->doctrine
            ->getRepository(Menu::class)
            ->getMenu($id_menu);
    }
}
