<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aliment", name="aliment_")
 */
class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(AlimentRepository $alimentRepository): Response
    {
        $aliments = $alimentRepository->findAll();
        return $this->render('aliment/index.html.twig', [
            'aliments' => $aliments,
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, EntityManagerInterface  $entityManager): Response
    {
        $aliment = new Aliment();
        $form = $this->createForm(AlimentType::class, $aliment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aliment);
            $entityManager->flush();

            return $this->redirectToRoute('aliment_index');
        }

        return $this->render('aliment/new.html.twig', [
           'form' => $form->createView(),
        ]);
    }
}
