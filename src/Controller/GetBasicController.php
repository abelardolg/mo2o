<?php


namespace App\Controller;


use App\Interfaces\Impl\PunkapiHTTPApi;
use App\Services\BasicService;
use Doctrine\Migrations\Configuration\Exception\JsonNotValid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetBasicController extends AbstractController
{
    public function __invoke($food)
    {
        try {
            $basicService = new BasicService(new PunkapiHTTPApi());

            $data = $basicService->searchByFood($food);

            return  new JsonResponse($data);
        } catch(\Exception $e) {
            return new JsonResponse([]);
        }

    }
}