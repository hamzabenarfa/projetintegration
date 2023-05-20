<?php

// src/Controller/HomeController.php

namespace App\Controller;

use App\Entity\Voyage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $voyages = $this->entityManager->getRepository(Voyage::class)->findAll();

        return $this->render('home.html.twig', [
            'voyages' => $voyages,
        ]);
    }

    /**
     * @Route("/rechercher", name="rechercher")
     */
    public function rechercher(Request $request): Response
    {
        $nom = $request->query->get('nom');
        $voyages = $this->entityManager->getRepository(Voyage::class)->findByNom($nom);

        return $this->render('home.html.twig', [
            'voyages' => $voyages,
        ]);
    }
}

