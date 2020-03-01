<?php


namespace App\Interfaces\Impl;


use App\Constants\ApiServiceConstant;
use App\Interfaces\ApiHttpInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7;

class PunkapiHTTPApi implements ApiHttpInterface
{
    const STATUS_OK = 200;

    public function getBasic(string $param, string $value): \Psr\Http\Message\StreamInterface
    {
        $client = new Client(['base_uri' => ApiServiceConstant::BASE_URI]);
        try {
            $response = $client->request('GET', ApiServiceConstant::METHOD, [
                'query' => [$param => $value]
            ]);
            if (self::STATUS_OK === $response->getStatusCode()) {
                return $response->getBody();
            }
        } catch(RequestException $requestException) {

        }

    }


}