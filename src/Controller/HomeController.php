<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class HomeController extends AbstractController
{

    private HttpClientInterface $client;

    public function __construct(
        HttpClientInterface $client
    ) {
        $this->client = $client;
    }
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
        $request = $this->client->request(
            Request::METHOD_GET,
            'http://localhost:7999/data'
        );

        return $this->render(
            'exploitation.html.twig',
            [
                'data' => json_decode($request->getContent(), true)
            ]
        );
    }
}
