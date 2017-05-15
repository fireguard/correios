<?php

namespace Fireguard\Correios;

use Goutte\Client;

class CepCrawler
{
    /**
     * @param string $cep
     * @return array
     */
    public function searchForCep( $cep )
    {
        if ( !$this->isValidCep($cep) ) {
            return ['error' => 'Invalid cep'];
        }

        $client = new Client();
        $crawlerForm = $client->request('GET', 'http://m.correios.com.br/movel/buscaCepConfirma.do');

        $form = $crawlerForm->selectButton('Buscar')->form( $this->createForm($cep) );

        $resultForSearch = $client->submit($form);

        $results = $resultForSearch->filterXPath('//span[@class="respostadestaque"]')->extract(['_text']);

        return $this->extractResult($results);
    }

    /**
     * @param $cep
     * @return array
     */
    protected function createForm($cep )
    {
        return [
            'cepEntrada' => $cep,
            'tipoCep' => '',
            'cepTemp' => '',
            'metodo' => 'buscarCep'
        ];
    }

    /**
     * @param string $cep
     * @return bool
     */
    protected function isValidCep( $cep )
    {
        return preg_match('/^[0-9]{5}-[0-9]{3}$/', trim($cep));
    }

    /**
     * @param $results
     * @return array
     */
    protected function extractResult($results )
    {
        if (count($results) >= 4 && !empty($results[0]) && !empty($results[1]) && !empty($results[2]) ) {
            $cityState = explode('/', $results[2], 2);

            return [
                'address' => trim($results[0]),
                'district' => trim($results[1]),
                'city' => trim($cityState[0]),
                'state' => trim($cityState[1])
            ];

        } else {
            return ['error' => 'Not found address'];
        }
    }
}
