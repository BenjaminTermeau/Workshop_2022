<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="redirect")
     */
    public function index(): RedirectResponse
    {
        return $this->redirect('/home_controller');
    }

    /**
     * @Route("/home_controller", name="home_controller")
     *
     * @return Response 
     */
    public function home(): Response
    {
        $info = 'info';
        return $this->render('home.html.twig', [
            'info' => $info
        ]);
    }

    /**
     * @Route("/zone", name="zone")
     *
     * @return Response 
     */
    public function zone(): Response
    {
        return $this->render('exploitation.html.twig');
    }
}
