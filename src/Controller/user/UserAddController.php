<?php


namespace App\Controller\user;


use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserAddController extends AbstractController
{

    /**
     * @Route("user/add")
     */

    public function add()
    {

        $user = new Users();
        $user->setFname('Codrut');
        $user->setLname('Befu');
        $user->setSlug('Befu');
        $user->setEmail('cb@sologics.de');
        $user->setPhone('0757352306');
        $user->setAddress('0757352306');

        $em=$this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->render('user/add.html.twig');
    }
}