<?php
namespace Brapi;

use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Exception\ClientErrorResponseException as GuzzleException;

require_once 'Zipcode.php';
require_once 'Error.php';

class Client {

  private $_url = 'https://api.brapi.io';

  private $_username = 'brapi';
  private $_password;

  private $_userAgent;
  private $_client;

  public function __construct($access_token, $user_agent = null) {
    $this->_password = $access_token;
    $this->_userAgent = $user_agent;

    $this->_client = $this->__createClient();
  }

  public function zipcode($zipcode) {
    $url = "/v1/zipcodes/{$zipcode}.json";

    try {
      $request = $this->_client->get($url)->send();
      $response = json_decode($request->getBody());

      return new Zipcode($response);
    } catch (GuzzleException $e) {
      $error = $e->getResponse()->getReasonPhrase();
      throw new Error($error);
    }
  }

  private function __createClient() {
    $client = new GuzzleClient($this->_url);
    $client->setDefaultOption('auth', array($this->_username, $this->_password));
    $client->setUserAgent($this->_userAgent);

    return $client;
  }

}
