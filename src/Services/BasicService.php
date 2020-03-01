<?php


namespace App\Services;
use App\Constants\ApiServiceConstant;
use App\Interfaces\ApiHttpInterface;


class BasicService
{
    /**
     * @var ApiHttpInterface
     */
    private $apiService;

    public function __construct(ApiHttpInterface $apiHttpService)
    {
        $this->apiService = $apiHttpService;
    }

    public function searchByFood(string $foodValue) {
        $beersBasic = [
            "error" => false,
            "message" => null,
            "data" => []
        ];

        try {
            $response = $this->apiService->getBasic(ApiServiceConstant::PARAM_FOOD, $foodValue);
            $beers = json_decode($response, true);


            foreach ($beers as $beer) {
                $beersBasic["data"][] = [

                    "id" => $beer["id"],
                    "name" => $beer["name"],
                    "description" => $beer["description"]
                ];
            }
        } catch(\Exception $exception) {
            $beersBasic = [
                "error" => $exception->getCode(),
                "message" => $exception->getMessage(),
                "data" => []
            ];
        }

        return $beersBasic;
    }
}