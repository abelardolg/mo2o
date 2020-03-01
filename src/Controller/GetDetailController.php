<?php


namespace App\Controller;


use App\Interfaces\Impl\PunkapiHTTPApi;
use App\Services\DetailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetDetailController extends AbstractController
{
    public function __invoke($food)
    {
        try {
            $detailService = new DetailService(new PunkapiHTTPApi());

            $data = $detailService->searchByFood($food);

            return  new JsonResponse($data);
        } catch(\Exception $e) {
            return new JsonResponse([]);
        }
    }
}