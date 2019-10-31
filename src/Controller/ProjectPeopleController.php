<?php

namespace App\Controller;

use App\Entity\ProjectPeople;
use App\Form\ProjectPeopleType;
use App\Repository\ProjectPeopleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/project/people")
 */
class ProjectPeopleController extends AbstractController
{
    /**
     * @Route("/", name="project_people_index", methods={"GET"})
     * @param ProjectPeopleRepository $projectPeopleRepository
     * @return Response
     */
    public function index(ProjectPeopleRepository $projectPeopleRepository): Response
    {
        return $this->render('project_people/index.html.twig', [
            'project_peoples' => $projectPeopleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="project_people_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $projectPerson = new ProjectPeople();
        $form = $this->createForm(ProjectPeopleType::class, $projectPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projectPerson);
            $entityManager->flush();

            return $this->redirectToRoute('project_people_index');
        }

        return $this->render('project_people/new.html.twig', [
            'project_person' => $projectPerson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="project_people_show", methods={"GET"})
     * @param ProjectPeople $projectPerson
     * @return Response
     */
    public function show(ProjectPeople $projectPerson): Response
    {
        return $this->render('project_people/show.html.twig', [
            'project_person' => $projectPerson,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="project_people_edit", methods={"GET","POST"})
     * @param Request $request
     * @param ProjectPeople $projectPerson
     * @return Response
     */
    public function edit(Request $request, ProjectPeople $projectPerson): Response
    {
        $form = $this->createForm(ProjectPeopleType::class, $projectPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_people_index');
        }

        return $this->render('project_people/edit.html.twig', [
            'project_person' => $projectPerson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="project_people_delete", methods={"DELETE"})
     * @param Request $request
     * @param ProjectPeople $projectPerson
     * @return Response
     */
    public function delete(Request $request, ProjectPeople $projectPerson): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projectPerson->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projectPerson);
            $entityManager->flush();
        }

        return $this->redirectToRoute('project_people_index');
    }
}
