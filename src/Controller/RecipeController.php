<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Form\RecipeType;
use App\Repository\AlimentRepository;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recipe", name="recipe_")
 */
class RecipeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(RecipeRepository $recipeRepository): Response
    {
        $recipes = $recipeRepository->findAll();
        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }
    
    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($recipe->getIngredients() as $ingredient) {
                $ingredient->setRecipe($recipe);
            }
            $entityManager->persist($recipe);
            $entityManager->flush();
            return $this->redirectToRoute('default_index');
        }

        return $this->render('recipe/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(Recipe $recipe): Response
    {
        return $this->render('recipe/show.html.twig' , [
            'recipe' => $recipe
        ]);
    }
}
