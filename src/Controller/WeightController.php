<?php

namespace App\Controller;

use App\Entity\Weight;
use App\Form\WeightType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WeightController extends AbstractController

/**
* @Route("/weight", name="weight_")
*/

{
    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request)
    {

        $weight = new Weight();

        $form = $this->createForm(WeightType::class, $weight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($weight);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Enregistrement effectué'
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('weight/_form_new.html.twig', [
            'weight' => $weight,
            'form' => $form->createView(),

        ]);
    }
        
}
