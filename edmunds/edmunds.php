<?php

/**
 * Author: lflahive
 * Version: 0.1
 */
class Edmunds
{
    private $BASE_URL = 'https://api.edmunds.com';
    private $BASE_MEDIA_URL = 'http://media.ed.edmunds-media.com';
    private $PARAMETERS = array();

    public function __construct($key)
    {
        if (!is_string($key)) {
            throw new Exception('$key is not a string.');
        }

        $this->PARAMETERS = array_merge($this->PARAMETERS, array('api_key' => $key, 'fmt' => 'json'));
    }

    public function make_call($endpoint, $params = false)
    {
        if ($params != false) {
            if (!is_array($params)) {
                throw new Exception('$params is not an array.');
            }

            $this->PARAMETERS = array_merge($this->PARAMETERS, $params);
        }

        $payloadstring = '?';
        $payloadcount = 1;

        foreach ($this->PARAMETERS as $key => $value) {
            $payloadstring .= "$key=$value";
            if ($payloadcount != count($this->PARAMETERS))
                $payloadstring .= '&';
            $payloadcount++;
        }

        $url = $this->BASE_URL . $endpoint . $payloadstring;

        try {
            return json_decode(file_get_contents($url));
        } catch (Exception $e) {
            exit($e);
        }
    }
}