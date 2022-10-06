<?php

namespace App\Controller;

use App\Service\DataService as ServiceDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\src\Service\DataService;


class HomeController extends AbstractController
{
    private ServiceDataService $dataService;

    public function __construct(
        ServiceDataService $dataService
    ) {
        $this->dataService = $dataService;
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
        $data = $this->dataService->getData();
        $etatFilet = $this->dataService->getEtatFilet();

        $données = json_decode($data->getContent(), true);

        return $this->render(
            'exploitation.html.twig',
            [
                'data' => $données,
                'vitesse' => explode(' ', $données['vitesse_vent'])[0],
                'etatFilet' => json_decode($etatFilet->getContent(), true)['etatFilet']
            ]
        );
    }
}
