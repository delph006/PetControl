<?php

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetType;
use App\Repository\PetRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/pet", name="pet_")
*/

class PetController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index()
    {
        $user = $this->getUser();
        return $this->render('pet/index.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods="GET")
     */
    public function show(Pet $pet)
    {
        return $this->render('pet/show.html.twig', [
            'pet' => $pet,
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        $pet= new Pet();
        $pet->setUser($this->getUser());

        $form = $this->createForm(PetType::class, $pet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pet);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Enregistrement effectué'
            );

            return $this->redirectToRoute('pet_list');
        }

        return $this->render('pet/_form_new.html.twig', [
            'pet' => $pet,
            'form' => $form->createView(),

        ]);
    }

}
