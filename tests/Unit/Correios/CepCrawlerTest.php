<?php


class CepCrawlerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Fireguard\Correios\CepCrawler
     */
    protected $cepCrawler;

    public function setUp()
    {
        parent::setUp();
        $this->cepCrawler = new \Fireguard\Correios\CepCrawler();
    }

    public function testSearchForCepWithValidParam()
    {
        $expected = [
            'address' => 'Praça Rotary Club de São Paulo-Norte',
            'district' => 'Parque Mandaqui',
            'city' => 'São Paulo',
            'state' => 'SP'
        ];
        $result = $this->cepCrawler->searchForCep('02433-000');
        $this->assertEquals($expected, $result);
    }

    public function testSearchForCepWithValidParamAndNotFountAddress()
    {
        $expected = ['error' => 'Not found address'];
        $result = $this->cepCrawler->searchForCep('99999-999');
        $this->assertEquals($expected, $result);
    }

    public function testSearchForCepWithInvalidParam()
    {
        $expected = ['error' => 'Invalid cep'];
        $result = $this->cepCrawler->searchForCep('02433-00');
        $this->assertEquals($expected, $result);

        $result = $this->cepCrawler->searchForCep('Invalid-Cep');
        $this->assertEquals($expected, $result);
    }

}
