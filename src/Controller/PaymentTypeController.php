<?php

namespace App\Controller;

use App\Entity\PaymentType;
use App\Form\PaymentTypeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/payment/type")
 */
class PaymentTypeController extends AbstractController
{
    /**
     * @Route("/", name="payment_type_index", methods={"GET"})
     */
    public function index(): Response
    {
        $paymentTypes = $this->getDoctrine()
            ->getRepository(PaymentType::class)
            ->findAll();

        return $this->render('payment_type/index.html.twig', [
            'payment_types' => $paymentTypes,
        ]);
    }

    /**
     * @Route("/new", name="payment_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $paymentType = new PaymentType();
        $form = $this->createForm(PaymentTypeType::class, $paymentType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paymentType);
            $entityManager->flush();

            return $this->redirectToRoute('payment_type_index');
        }

        return $this->render('payment_type/new.html.twig', [
            'payment_type' => $paymentType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="payment_type_show", methods={"GET"})
     */
    public function show(PaymentType $paymentType): Response
    {
        return $this->render('payment_type/show.html.twig', [
            'payment_type' => $paymentType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="payment_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PaymentType $paymentType): Response
    {
        $form = $this->createForm(PaymentTypeType::class, $paymentType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('payment_type_index');
        }

        return $this->render('payment_type/edit.html.twig', [
            'payment_type' => $paymentType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="payment_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PaymentType $paymentType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paymentType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($paymentType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('payment_type_index');
    }
}
