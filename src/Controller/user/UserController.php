<?php


namespace App\Controller\user;


use App\Entity\Users;
use App\Service\app_helper;
use App\Service\app_userInfo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @Route("userview/{userSlug}")
     *
     */

    public function viewUser($userSlug,app_helper $helper,app_userInfo $userInfo){
        $repository = $this->getDoctrine()->getManager()->getRepository(Users::class);

        /** @var Users $user */
        $user=$repository->findOneBy(['slug'=>$userSlug]);
        return $this->render('user/main.html.twig',[
            'template'=>$helper->test(),
            'user'=>$user
        ]);
    }
}