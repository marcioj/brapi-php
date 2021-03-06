<?php
require_once 'src/Brapi/Client.php';

class BrapiTest extends PHPUnit_Framework_TestCase {

  private $client;

  public function setUp() {
    $access_token = getenv('BRAPI_ACCESS_TOKEN');
    $this->client = new \Brapi\Client($access_token, 'BrapiPHP');
  }

  public function tearDown() {
    unset($this->client);
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
    $this->setExpectedException('\Brapi\Error', 'Not Found');
    $this->client->zipcode('ola');
  }

  public function testInvalidAccessToken() {
    $this->client = new \Brapi\Client('invalid', 'BrapiPHP');

    $this->setExpectedException('\Brapi\Error', 'Unauthorized');
    $this->client->zipcode('20071003');
  }

}
