<?php

namespace App\Controller;

use App\Entity\AuteurEntity;
use App\Form\AuteurType;
use App\Entity\ArticleEntity;
use App\Form\ArticleType;
use App\Repository\AuteurEntityRepository;
use App\Repository\ArticleEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article.index")
     */
    public function index(ArticleEntityRepository $repository)
    {
          $articles = $repository->findAll();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles'=> $articles
        ]);
    }

     /**
     * @Route("/article/create", name="article.create")
     */

    public function create(Request $request)
    {   
        $articles = new ArticleEntity();
        $formArticle = $this->createForm(ArticleType::class,$articles);
        $formArticle->handleRequest($request);
        $manager = $this->getDoctrine()->getManager();
               if($formArticle->isSubmitted() && $formArticle->isValid()){
                   $articles->setCreatedAt(new \DateTime());
                   $articles->setUpdatedAt(new \DateTime());
                   $manager->persist($articles);
                   $manager->flush();
               }

        return $this->render('article/create.html.twig', [
            'controller_name' => 'ArticleController',
            'formArticle'=> $formArticle->createView()
        ]);
    }

}
