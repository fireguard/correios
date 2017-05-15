# Fireguard Correios
Utilities for interaction with the post office of Brazil

[![Build Status](https://travis-ci.org/fireguard/correios.png)](https://travis-ci.org/fireguard/correios)
[![Latest Stable Version](https://poser.pugx.org/fireguard/correios/v/stable)](https://packagist.org/packages/fireguard/correios)
[![Latest Unstable Version](https://poser.pugx.org/fireguard/correios/v/unstable)](https://packagist.org/packages/fireguard/correios)
[![Total Downloads](https://poser.pugx.org/fireguard/correios/downloads)](https://packagist.org/packages/fireguard/correios)
[![License](https://poser.pugx.org/fireguard/correios/license)](https://packagist.org/packages/fireguard/correios)
[![Code Climate](https://codeclimate.com/github/fireguard/correios/badges/gpa.svg)](https://codeclimate.com/github/fireguard/correios)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/690912b5-c631-4b41-b885-7f98616dfa05/big.png)](https://insight.sensiolabs.com/projects/690912b5-c631-4b41-b885-7f98616dfa05)

## Cep Crawler 

### Usage example

```php
$crawler = new Fireguard\Correios\CepCrawler();

$result = $crawler->searchForCep('02433-000');

// Expected Result
array(
    'address' => 'Praça Rotary Club de São Paulo-Norte',
    'district' => 'Parque Mandaqui',
    'city' => 'São Paulo',
    'state' => 'SP'
)
```

