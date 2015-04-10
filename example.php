<?php

require_once('edmunds/edmunds.php');

$key = 'YOUR API KEY';

$edmunds = new Edmunds($key);

echo var_dump($edmunds->make_call('/api/vehicle/v2/honda/accord', array('state' => 'new', 'year' => '2014')));

/*
Results:

object(stdClass)[2]
  public 'id' => string 'Honda_Accord' (length=12)
  public 'name' => string 'Accord' (length=6)
  public 'niceName' => string 'accord' (length=6)
  public 'years' =>
    array (size=1)
      0 =>
        object(stdClass)[3]
          public 'id' => int 200487197
          public 'year' => int 2014
          public 'styles' =>
            array (size=21)
              ...
*/