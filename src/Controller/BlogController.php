<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends BaseController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        $this->data['page'] = $this->getBlog();

        return $this->baseRender('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'data' => $this->data,
        ]);
    }
    #[Route('/blog/{slug}', name:'path_blog')]
    public function blog($slug): Response
    {

        $this->data['page'] = $this->getIdBlgo($slug);

        return $this->baseRender('blog/one_blog.html.twig', [
            'controller_name' => 'BlogController',
            'data' => $this->data,
        ]);
    }

    private function getBlog()
    {
        return $this->doctrine->getRepository(Blog::class)->getBlog();
    }

    private function getIdBlgo($slug)
    {
        return $this->doctrine->getRepository(Blog::class)->getIdBlog($slug);
    }
}
