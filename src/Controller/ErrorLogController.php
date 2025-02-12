<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorLogController extends AbstractController
{

    #[Route('/errors', name: 'errors')]
    public function index()
    {
        return $this->render('homepage/errors.html.twig');
    }
}