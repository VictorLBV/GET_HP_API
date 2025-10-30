<?php

namespace App;

use GuzzleHttp\Client;

class HarryPotter
{
    private $client;

    const BASE_URL = 'https://potterapi-fedeperin.vercel.app';
    const LANGUAGE = '/en';
    const THEME = '/characters';
    const FINAL_URL = self::BASE_URL . self::LANGUAGE . self::THEME;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::FINAL_URL
        ]);
    }

    /**
     * Método responsável por buscar um personagem aleatório de Harry Potter
     * @return array
     */
    public function getRandomHpPerson()
    {
        try {
            $response = $this->client->request('GET', '');
            $body = $response->getBody();
            $data = json_decode($body, true);

            if (is_array($data)) {
                $randomIndex = array_rand($data);
                return $data[$randomIndex];
            } else {
                throw new \Exception("Resposta inválida da API.");
            }
        } catch (\Exception $e) {
            die("Ocorreu um erro: " . $e->getMessage());
        }
    }
}
