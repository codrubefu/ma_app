<?php


namespace App\Controller;


use App\Service\app_helper;
use App\Service\helper;
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

    public function userPage($userId,app_helper $helper)
    {
        return $this->render('user/main.html.twig',[
            'template'=>$helper->test(),
            'userId'=>$userId
        ]);
    }
}