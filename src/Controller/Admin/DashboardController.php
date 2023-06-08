<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Blog;
use App\Entity\Category;
use App\Entity\CategoryBlog;
use App\Entity\Event;
use App\Entity\InstWork;
use App\Entity\Menu;
use App\Entity\News;
use App\Entity\Scientist;
use App\Entity\ScientistDirt;
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
       yield MenuItem::linkToCrud('Список ученых', 'fa fa-newspaper-o', Scientist::class);
       yield MenuItem::linkToCrud('Статьи', 'fas fa-scroll', Blog::class);
       yield MenuItem::linkToCrud('Новости', 'fa fa-newspaper-o', News::class);
       yield MenuItem::subMenu('Категории', 'fa fa-window-restore')->setSubItems(
           [
                MenuItem::linkToCrud('Категории ученых', 'fa fa-list', Category::class),
                MenuItem::linkToCrud('Категории статей', 'fa fa-list', CategoryBlog::class),
           ]
       );
//       yield MenuItem::linkToCrud('Запуск python скрипта', "fas fa-question", Scientist::class);
       yield MenuItem::linkToCrud('Не обработанные данные', "fas fa-question", ScientistDirt::class);
//       yield MenuItem::linkToCrud('Работы', "fas fa-info-square", ::class);
       yield MenuItem::linkToCrud('Институты', "fa fa-university", InstWork::class);
       yield MenuItem::linkToCrud('События', "fas fa-microphone", Event::class);
    }
}
