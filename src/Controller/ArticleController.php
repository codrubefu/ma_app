<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/")
     */

    public function index()
    {
        return $this->render('main/index.html.twig');
    }


    /**
     * @Route ("/user/{userId}")
     */

    public function userPage($userId)
    {
        return $this->render('user/main.html.twig');
    }
}