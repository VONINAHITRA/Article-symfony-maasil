<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleEntityRepository;
use App\Entity\ArticleEntity;
class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(ArticleEntityRepository $repository) 
    {
        $articles = $repository->findBy([],['id'=>'DESC'],5);
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
            'articles'=> $articles
        ]);
    }
}
