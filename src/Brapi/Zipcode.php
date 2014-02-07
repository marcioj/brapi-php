<?php
namespace Brapi;

class Zipcode {

  public $address;
  public $address_type;
  public $city;
  public $city_ibge_code;
  public $neighborhood;
  public $state;
  public $zipcode;

  public function __construct($data) {
    $data = get_object_vars($data);

    foreach ($data AS $key => $value) {
      $this->{$key} = $value;
    }
  }

}
