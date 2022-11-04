<?php
// src/Controller/formUserController.php
namespace App\Controller;
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

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // ... perform some action, such as saving the data to the database
            // for example, if User is a Doctrine entity, save it!
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



