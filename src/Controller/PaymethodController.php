<?php

namespace App\Controller;

use App\Entity\Paymethod;
use App\Form\PaymethodType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/paymethod")
 */
class PaymethodController extends AbstractController
{
    /**
     * @Route("/", name="paymethod_index", methods={"GET"})
     */
    public function index(): Response
    {
        $paymethods = $this->getDoctrine()
            ->getRepository(Paymethod::class)
            ->findAll();

        return $this->render('paymethod/index.html.twig', [
            'paymethods' => $paymethods,
        ]);
    }

    /**
     * @Route("/new", name="paymethod_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $paymethod = new Paymethod();
        $form = $this->createForm(PaymethodType::class, $paymethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paymethod);
            $entityManager->flush();

            return $this->redirectToRoute('paymethod_index');
        }

        return $this->render('paymethod/new.html.twig', [
            'paymethod' => $paymethod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="paymethod_show", methods={"GET"})
     */
    public function show(Paymethod $paymethod): Response
    {
        return $this->render('paymethod/show.html.twig', [
            'paymethod' => $paymethod,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="paymethod_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Paymethod $paymethod): Response
    {
        $form = $this->createForm(PaymethodType::class, $paymethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('paymethod_index');
        }

        return $this->render('paymethod/edit.html.twig', [
            'paymethod' => $paymethod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="paymethod_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Paymethod $paymethod): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paymethod->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($paymethod);
            $entityManager->flush();
        }

        return $this->redirectToRoute('paymethod_index');
    }
}
