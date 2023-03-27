<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/" , name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('articles/homepage.html.twig', [

        ]);
    }

    /**
     * @Route("/news" , name="app_news")
     */
    public function news()
    {
        return $this->render('articles/news.html.twig', [

        ]);
    }

    /**
     * @Route("/info" , name="app_info")
     */
    public function info()
    {
        return $this->render('articles/info.html.twig', [

        ]);
    }


    /**
     * @Route("/about" , name="app_about")
     */
    public function about()
    {
        return $this->render('articles/about.html.twig', [

        ]);
    }





    /**
     * @Route("/articles/{slug}", name="app_artical_show")
     */
    public function show($slug)
    {
        $comments =[
            'lorem posdemd  sdaa sdas adas sd dsaad',
            'dadasdadasd dadsdadas das dadsqdgqjsda ',
            ' sdadasq kjk;lakjdgj kqjklekklrqeklk ',

        ];
        return $this->render('articles/show.html.twig', [
           'article' =>  ucwords(str_replace('-', ' ' , $slug)),
            'comments' => $comments,
        ]);
//        return new Response(
//            sprintf('Будующая страница статьи: %s' ,
//             ucwords(str_replace('-', ' ' , $slug))
//        ));
    }
}