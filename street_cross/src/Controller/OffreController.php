<?php

namespace App\Controller;

use App\Entity\Offre;
 
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
    private $entityManger;

    //type-int dans le constracture:
    //le container deserviceva interpréter le type transmis
    //et renvoyer l'objet(le service) correspodant
    //on peut retrouver ce type en exécutant le console:
    //php bin/console debug:autowiring entity
public function __construct(EntityManagerInterface $entityManger)
{
    $this->entityManger=$entityManger;
}

    /**
     * @Route("/offre", name="offres_list")
     */
    public function index()
    {
        $offre = new offre();
        //Interface fluide
        $offre->setTitle("Mon titre")
            ->setDescription ("Lorem ipsum...");
            $offre2 = new offre();
            $offre2 ->setTitle("Autre titre")
            ->setDescription ("autre lorem ipsum...");
            $offre3 = new offre();
            $offre3 ->setTitle("Troisièeme titre")
            ->setDescription ("Troisièeme Lorem ipsum...");
        return $this->render('offre/index.html.twig', [
            'controller_name' => 'OffreController',
            'offres' => [$offre, $offre2, $offre3]
        ]);
        }
    
    /**
     * @Route("/offre/create", name="offre_create")
     */
        public function create(EntityManagerInterface $entityManger): Response
        {
            $offre = new Offre();
            $offre->setTitle("ma premiére offrepersistée ")
                    ->setDescription("c'est la premiére tentative d'enrgistement d'offre");
                    $this->entityManger->persist($offre);
                    $this ->entityManger->flush();
            return $this->render(
                'offre/create.html.twig'
            );
        }
    }
