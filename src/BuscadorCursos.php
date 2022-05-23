<?php

namespace Alura\Buscador;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorCursos
{
    private $httpClient;
    private $domCrawler;
    public function __construct()
    {
        $this->httpClient = new Client([
            'verify' => false,
            'base_uri' => 'https://www.alura.com.br/'
        ]);
        $this->domCrawler = new Crawler();
    }

    public function buscarCursosPhp()
    {
        $cursos = [];
        $result = $this->httpClient->request("get", "cursos-online-programacao/php");
        $html = $result->getBody();
        $this->domCrawler->addHtmlContent($html);
        $elements = $this->domCrawler->filter("span.card-curso__nome");
        foreach ($elements as $node) {
            $cursos[] = $node->textContent;
        }
        return $cursos;
    }
}
