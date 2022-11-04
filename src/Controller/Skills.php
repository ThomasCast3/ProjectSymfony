<?php
// src/Controller/formUserController.php
namespace App\Controller;
use App\Entity\SkillUser;
use App\Form\SkillUserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Skills extends AbstractController
{
    #[Route('/skills', name: 'skills')]
    public function index(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $skilluser = new SkillUser();
        $skills = $this->createForm(SkillUserType::class, $skilluser);

        $skills->handleRequest($request);
        if ($skills->isSubmitted() && $skills->isValid()) {
            $data = $skills->getData();
            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($skilluser);
            $entityManager->flush();
            return $this->redirectToRoute('skills');
        }
        return $this->render('indexe.html.twig', [
            'skills' => $skills->createView()
        ]);
    }
}



