<?php

namespace App\Controller;

use App\Entity\Sell;
use App\Form\SellType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sell")
 */
class SellController extends AbstractController
{
    /**
     * @Route("/", name="sell_index", methods={"GET"})
     */
    public function index(): Response
    {
        $sells = $this->getDoctrine()
            ->getRepository(Sell::class)
            ->findAll();

        return $this->render('sell/index.html.twig', [
            'sells' => $sells,
        ]);
    }

    /**
     * @Route("/new", name="sell_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sell = new Sell();
        $form = $this->createForm(SellType::class, $sell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sell);
            $entityManager->flush();

            return $this->redirectToRoute('sell_index');
        }

        return $this->render('sell/new.html.twig', [
            'sell' => $sell,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sell_show", methods={"GET"})
     */
    public function show(Sell $sell): Response
    {
        return $this->render('sell/show.html.twig', [
            'sell' => $sell,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sell_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sell $sell): Response
    {
        $form = $this->createForm(SellType::class, $sell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sell_index');
        }

        return $this->render('sell/edit.html.twig', [
            'sell' => $sell,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sell_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sell $sell): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sell->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sell);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sell_index');
    }
}
