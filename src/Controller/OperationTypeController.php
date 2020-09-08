<?php

namespace App\Controller;

use App\Entity\OperationType;
use App\Form\OperationTypeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/operation/type")
 */
class OperationTypeController extends AbstractController
{
    /**
     * @Route("/", name="operation_type_index", methods={"GET"})
     */
    public function index(): Response
    {
        $operationTypes = $this->getDoctrine()
            ->getRepository(OperationType::class)
            ->findAll();

        return $this->render('operation_type/index.html.twig', [
            'operation_types' => $operationTypes,
        ]);
    }

    /**
     * @Route("/new", name="operation_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $operationType = new OperationType();
        $form = $this->createForm(OperationTypeType::class, $operationType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($operationType);
            $entityManager->flush();

            return $this->redirectToRoute('operation_type_index');
        }

        return $this->render('operation_type/new.html.twig', [
            'operation_type' => $operationType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="operation_type_show", methods={"GET"})
     */
    public function show(OperationType $operationType): Response
    {
        return $this->render('operation_type/show.html.twig', [
            'operation_type' => $operationType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="operation_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OperationType $operationType): Response
    {
        $form = $this->createForm(OperationTypeType::class, $operationType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operation_type_index');
        }

        return $this->render('operation_type/edit.html.twig', [
            'operation_type' => $operationType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="operation_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, OperationType $operationType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$operationType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($operationType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('operation_type_index');
    }
}
