<?php

/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 23.02.2020
 * Time: 15:03
 */
class VkApi
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function createConnection(): void
    {
        echo "Создаем коннект к api Vk.\n";
    }

}