<?php
namespace Brapi;

require_once 'Zipcode.php';
require_once 'Error.php';

class Client {

  private $_url = 'https://api.brapi.io';
  private $_username = 'brapi';
  private $_password;
  private $_userAgent;

  public function __construct($access_token, $user_agent) {
    $this->_password = $access_token;
    $this->_userAgent = $user_agent;
  }

  public function zipcode($zipcode) {
    $url = "{$this->_url}/v1/zipcodes/{$zipcode}.json";
    $response = \Unirest::get($url, null, null, $this->_username, $this->_password);

    if ($response->code == 200) {
      return new Zipcode($response->body);
    } else {
      throw new Error($response->body->error);
    }
  }

}
