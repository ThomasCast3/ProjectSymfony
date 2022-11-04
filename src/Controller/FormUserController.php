<?php
// src/Controller/formUserController.php
namespace App\Controller;

use Faker;
use App\Entity\User;
use App\Form\UserType;
use App\Entity\SkillUser;
use App\Form\SkillUserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormUserController extends AbstractController
{
    #[Route('/FormUser', name: 'FormUser')]
    public function index(Request $request, ManagerRegistry $managerRegistry): Response
    {

        $faker = Faker\Factory::create('fr_FR');
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            $user->setIdUser($faker->numberBetween(0,4));
            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('FormUser');
        }
        return $this->render('index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}