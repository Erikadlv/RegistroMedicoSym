<?php

namespace App\Controller;

use App\Form\PersonalType;
use App\Entity\Personal;
use App\Repository\PersonalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PersonalController extends AbstractController
{
    #[Route('/', name: 'inicio')]
    public function inicio()
    {
        return $this->render('/inicio.html.twig');
    }

    #[Route('/personal', name: 'personal')]
    public function personal(PersonalRepository $persoRepository): Response
    {
        return $this->render('personal/personal.html.twig', ['personal'=> $persoRepository->findAll()]);
    }

    #[Route('/agregar_perso', name: 'agregar_perso')]
    public function agregar_perso(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PersonalType::class, new  Personal());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $personal = $form->getData();
            $entityManager->persist($personal);
            $entityManager->flush();
            $this->addFlash('success', 'Se ha agregado un nuevo empleado');
            return $this->redirectToRoute('personal');
        }
        return $this->render('personal/agregar_perso.html.twig',
        ['form'=>$form->createView()
        ]);
    }

    #[Route('/editar_perso/{id}', name: 'editar_perso')]
   
    public function editar_perso(Personal $personal, Request $request, EntityManagerInterface $entiyManager)
    {
        $form=$this->createForm(PersonalType::class, $personal);
        $form->handleRequest($request);
        if($form->IsSubmitted() && $form->isvalid()){
            $personal = $form->getData();
            $entiyManager->persist($personal);
            $entiyManager->flush();
            $this->addFlash('success', 'Datos actualizados');
            return $this->redirectToRoute('personal');
        }

        return $this->render('personal/editar_perso.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/delete/{id}', name: 'delete_perso')]
    public function delete(Personal $personal, EntityManagerInterface $em): RedirectResponse
    {
        $em->remove($personal);
        $em->flush();
        $this->addFlash('success', 'Registro eliminado');

        return $this->redirectToRoute('personal');
    }
}
