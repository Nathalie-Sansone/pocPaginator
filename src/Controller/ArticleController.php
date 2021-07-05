<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(ArticleRepository $articleRepository, EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $dataArticles = $articleRepository->findAll();
        $articles = $paginator->paginate(
            $dataArticles,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
