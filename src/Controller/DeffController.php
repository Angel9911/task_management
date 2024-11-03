<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * TEST CONTROLLER
 */
class DeffController extends AbstractController
{


    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE){
            ini_set('session.cookie_httponly', 1);  // Prevent JavaScript access to session cookies
            ini_set('session.cookie_secure', 1);  // Only send cookies over HTTPS
            session_start();
        }
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('homepage/base.html.twig', [
            'controller_name' => 'DeffController',
        ]);
    }

    #[Route('/submit', name: 'form_email_submit', methods: ['POST'])]
    public function handleForm(Request $request): Response
    {
        $user2 = new Task("tss","pas", "da", "ne");
        //$email = $request->request->get('email');
        // Process the email here (e.g., save to database or send an email)
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if ($email === false) {
            die("Invalid email format");
        }

        $this->addFlash('email', $email);
        $_SESSION['email'] = $email;
        return $this->redirectToRoute('homepage');
        // Redirect or return a response
        //return $this->redirectToRoute('homepage', ['email' => $email]);
    }

    #[Route('/homepage', name: 'homepage')]
    public function homepage(Request $request): Response{

        //$email = $request->query->get('email');

       /* if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== "on"){
            header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            exit;
        }*/

        $email = $request->getSession()->getFlashBag()->get('email', [null])[0];

        if(empty($email) && isset($_SESSION['email'])){
            $email = $_SESSION['email'];
        }

        return $this->render('homepage/homepage.html.twig', [
            'controller_name' => 'DeffController',
            'email' => $email,
        ]);
    }
}