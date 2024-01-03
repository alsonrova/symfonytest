<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SwapiDataService;

class ServiceController extends AbstractController
{
    private $swapiDataService;

    public function __construct(SwapiDataService $swapiDataService)
    {
        $this->swapiDataService = $swapiDataService;
    }

    #[Route('/', name: 'app_service')]
    public function index(): Response
    {
        $starshipsInfos = $this->swapiDataService->getStarships();
        $peoplesInfos = $this->swapiDataService->getPeoples();
        $planetsInfos = $this->swapiDataService->getPlanets();
        $filmsInfos = $this->swapiDataService->getFilms();


        $starships = $starshipsInfos["results"];
        $peoples = $peoplesInfos["results"];
        $planets = $planetsInfos["results"];
        $films = $filmsInfos["results"];

        return $this->render('service/index.html.twig', compact('starships','planets','peoples','films'));
    }

    #[Route('/people/{id}', name: 'app_service_people')]
    public function people($id): Response
    {
        $people = $this->swapiDataService->getPeople($id);
        return $this->render('service/people.html.twig', compact('people'));
    }

    #[Route('/starship/{id}', name: 'app_service_starship')]
    public function starship($id): Response
    {
        $starship = $this->swapiDataService->getStarship($id);
        return $this->render('service/starship.html.twig', compact('starship'));
    }

    #[Route('/planet/{id}', name: 'app_service_planet')]
    public function planet($id): Response
    {
        $planet = $this->swapiDataService->getPlanet($id);
        return $this->render('service/planet.html.twig', compact('planet'));
    }

    #[Route('/film/{id}', name: 'app_service_film')]
    public function film($id): Response
    {
        $film = $this->swapiDataService->getFilm($id);
        return $this->render('service/film.html.twig', compact('film','id'));
    }



}
