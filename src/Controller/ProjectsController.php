<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Request;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/projets", name="projets_index")
     */
    public function index(Request $request, ProjectRepository $projectRepo)
    {
    	$page = $request->query->get('page', 1);
        $projects = $projectRepo->getProjects($page);

        return $this->render('projects/index.html.twig', compact('projects'));
    }
}
