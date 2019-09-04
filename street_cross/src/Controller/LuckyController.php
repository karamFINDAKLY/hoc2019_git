<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number", name="lucky_number")
     */
    public function index()
    {
        $luckynumber= random_int(1 , 100);
    

        return $this->render(
            'lucky/number.html.twig', 
            ['lucky_number' =>  $luckynumber]
        );
    }
}
