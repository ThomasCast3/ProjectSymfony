<?php
// src/Controller/formController.php
namespace App\Controller;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class formController extends AbstractController
{
    #[Route('/form')]
    public function index(): Response
    {
        $form = $this->createForm(UserType::class);

        return $this->render('index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}