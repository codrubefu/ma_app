<?php


namespace App\Controller\user;


use App\Entity\Users;
use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserAddController extends AbstractController
{

    /**
     * @Route("user/add")
     */

    public function add(Request $request)
    {

       $form=$this->createForm(UserFormType::class);

       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
           dd($form->getData());
       }

        return $this->render('user/add.html.twig',[
            'userForm' => $form->createView()
        ]);
    }
}