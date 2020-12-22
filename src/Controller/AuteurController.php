<?php

namespace App\Controller;

use App\Entity\AuteurEntity;
use App\Form\AuteurType;
use App\Repository\AuteurEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{

    /**
     * @Route("/auteur/create", name="auteur.create")
     */
    public function create(Request $request)
    {   
        $auteurs = new AuteurEntity();
        $formAuteur = $this->createForm(AuteurType::class,$auteurs);
        $formAuteur->handleRequest($request);
        $manager = $this->getDoctrine()->getManager();
               if($formAuteur->isSubmitted() && $formAuteur->isValid()){
                   $auteurs->setCreatedAt(new \DateTime());
                   $auteurs->setUpdatedAt(new \DateTime());
                   $manager->persist($auteurs);
                   $manager->flush();
               }
        return $this->render('auteur/create.html.twig', [
            'controller_name' => 'AuteurController',
            'formAuteur'=> $formAuteur->createView()
        ]);
    } 
}
