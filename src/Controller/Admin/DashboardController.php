<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('security/dashboard.html.twig', [
            'dashboard_controller_filepath' => (new \ReflectionClass(static::class))->getFileName(),
            'dashboard_controller_class' => (new \ReflectionClass(static::class))->getShortName(),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Админ панель');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Рабочий стол', 'fa fa-home');
        yield MenuItem::subMenu('Права и доступы', 'fa fa-window-restore')->setSubItems(
            [
                MenuItem::linkToCrud('Пользователи', 'fa fa-user', Admin::class),
            ]
        );
       yield MenuItem::linkToCrud('Управление меню', 'fa fa-list', Menu::class);
    }
}
