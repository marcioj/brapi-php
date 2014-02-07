<?php
require_once 'src/Brapi/Client.php';

class BrapiTest extends PHPUnit_Framework_TestCase {

  private $client;

  public function setUp() {
    $access_token = $_ENV['BRAPI_ACCESS_TOKEN'];
    $user_agent = 'BrapiPHP';

    $this->client = new \Brapi\Client($access_token, $user_agent);
  }

  public function testValidZipcode() {
    $zipcode = $this->client->zipcode('20071003');

    $this->assertInstanceOf('\Brapi\Zipcode', $zipcode);
    $this->assertEquals("Presidente Vargas", $zipcode->address);
    $this->assertEquals("Presidente Vargas", $zipcode->address);
    $this->assertEquals("Avenida", $zipcode->address_type);
    $this->assertEquals("Rio de Janeiro", $zipcode->city);
    $this->assertEquals("3304557", $zipcode->city_ibge_code);
    $this->assertEquals("Centro", $zipcode->neighborhood);
    $this->assertEquals("RJ", $zipcode->state);
    $this->assertEquals("20071003", $zipcode->zipcode);
  }

  public function testInvalidZipcode() {
    $this->setExpectedException('\Brapi\Error');
    $this->client->zipcode('ola');
  }

}
