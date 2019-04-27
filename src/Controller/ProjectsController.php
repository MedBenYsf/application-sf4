<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/projets", name="projets_index")
     */
    public function index(Request $request, CacheInterface $cache, ProjectRepository $projectRepo)
    {
        $page = $request->query->get('page', 1);
        $key = 'demo';
        $demo = $cache->get($key, function (ItemInterface $item) {
            return 'demo';
        });

        $projects = $projectRepo->getProjects($page);

        return $this->render('projects/index.html.twig', compact('projects'));
    }
}
