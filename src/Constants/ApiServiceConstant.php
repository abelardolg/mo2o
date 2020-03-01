<?php


namespace App\Constants;

class ApiServiceConstant
{
    public const BASE_URI = "https://api.punkapi.com/v2/";
    public const METHOD = "beers";
    public const PARAM_FOOD = "food";
    public const BASE_URI_METHOD = self::BASE_URI . self::METHOD;
    public const BASE_URI_METHOD_PARAM = self::BASE_URI_METHOD . "?";
    public const BASE_URI_METHOD_FOOD = self::BASE_URI_METHOD_PARAM . self::PARAM_FOOD . "=";

}