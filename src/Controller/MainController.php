<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MainController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(HttpClientInterface $client)
    {
        $today = new \DateTime();
        $response = $client->request('GET','https://api.aladhan.com/v1/timingsByCity/'.date_format($today, 'd-m-Y').'?city=montrouge&country=france&method=12');

        return new JsonResponse($response->toArray());
    }
}